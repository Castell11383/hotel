import { Dropdown } from "bootstrap";
import { Toast, validarFormulario } from "../funciones";
import Swal from "sweetalert2";
import DataTable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje";


const formulario = document.getElementById('form-reservacion')
const tabla = document.getElementById('tabla-reservaciones')
const btnGuardar = document.getElementById('btnGuardar')
const btnModificar = document.getElementById('btnModificar')
const btnCancelar = document.getElementById('btnCancelar')


// Inicializamos el Datatable

let contador = 1;
const datatable = new DataTable('#tabla-reservaciones', {
    data: null,
    language: lenguaje,
    pageLength: '15',
    lengthMenu: [3, 9, 11, 25, 100],
    columns: [
        {
            title: 'No.',
            data: 'reser_id',
            width: '2%',
            render: (data, type, row, meta) => {
                // console.log(meta.ro);
                return meta.row + 1;
            }
        },
        {
            title: 'CLIENTE',
            data: 'clie_nombres',  // Mostrar el nombre completo del cliente
            render: (data, type, row, meta) => {
                return `${row.clie_nombres} ${row.clie_apellidos}`;  // Concatenar nombre y apellido
            }
        },
        {
            title: 'HABITACION',
            data: 'habi_tipo',  // Mostrar el tipo de habitación
        },
        {
            title: 'ENTRADA',
            data: 'reser_fecha_entrada'
        },
        {
            title: 'SALIDA',
            data: 'reser_fecha_salida'
        },
        
        {
            title: 'Acciones',
            data: 'reser_id',
            searchable: false,
            orderable: false,
            render: (data, type, row, meta) => {
                let html = `
              <button class='btn btn-warning modificar' data-reser_id="${data}" data-reser_cliente="${row.clie_nombres} ${row.clie_apellidos}" data-reser_habitacion="${row.habi_tipo}" data-reser_fecha_entrada="${row.reser_fecha_entrada}" data-reser_fecha_salida="${row.reser_fecha_salida}"><i class='bi bi-pencil-square'></i></button>
                <button class='btn btn-danger eliminar' data-reser_id="${data}"><i class="bi bi-trash-fill"></i></button>
                `
                return html;
            }
        },

    ]
})
btnModificar.parentElement.style.display = 'none'
btnModificar.disabled = true
btnCancelar.parentElement.style.display = 'none'
btnCancelar.disabled = true

// Función para buscar reservaciones y llenar la tabla
const buscar = async () => {
    try {
        const url = "/hotel/API/reservaciones/buscar"
        const config = {
            method: 'GET',
        }

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { codigo, mensaje, detalle, datos } = data;

        // tabla.tBodies[0].innerHTML = ''
        // const fragment = document.createDocumentFragment();
        console.log(datos);
        datatable.clear().draw();

        if (datos) {
            datatable.rows.add(datos).draw();
        }
       
    } catch (error) {
        console.log(error);
    }
}
buscar();

// Función para guardar la reservación
const guardar = async (evento) => {
    evento.preventDefault();
    const reserva_cliente_id = document.getElementById('clie_id').value;
    const reserva_habitacion_id = document.getElementById('habi_id').value;
    const reserva_fecha_entrada = document.getElementById('reser_fecha_entrada').value;
    const reserva_fecha_salida = document.getElementById('reser_fecha_salida').value;

    if (!reserva_cliente_id || !reserva_habitacion_id || !reserva_fecha_entrada || !reserva_fecha_salida) {
        Toast.fire({
            icon: 'info',
            text: 'Debe llenar todos los campos'
        });
        return;
    }

    const body = new FormData(formulario);
    const url = '/hotel/API/reservaciones/guardar'; // Cambia esta URL según tu ruta
    const config = {
        method: 'POST',
        body
    };

    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { codigo, mensaje } = data;
        let icon = 'info';
        switch (codigo) {
            case 1:
                formulario.reset();
                icon = 'success';
                buscar();
                break;
            case 0:
                icon = 'error';
                break;
        }
        Toast.fire({
            icon,
            text: mensaje
        });
    } catch (error) {
        console.log(error);
    }
    buscar();
};


//mandar a traer datos
const traerDatos = (e) => {
    const elemento = e.currentTarget.dataset;

    const inputId = document.getElementById('reser_id'); // ID de la reservación (campo hidden)
    const selectCliente = document.getElementById('clie_id'); // Select del cliente
    const inputHabitacion = document.getElementById('habi_id'); // Select de la habitación
    const inputEntrada = document.getElementById('reser_fecha_entrada');
    const inputSalida = document.getElementById('reser_fecha_salida');

    if (inputId && selectCliente && inputHabitacion && inputEntrada && inputSalida) {
        // Asignar valores
        inputId.value = elemento.reser_id;
        selectCliente.value = elemento.reser_cliente_id; // Asignar el clie_id al select
        inputHabitacion.value = elemento.reser_habitacion_id; // Asignar el habi_id
        inputEntrada.value = elemento.reser_fecha_entrada;
        inputSalida.value = elemento.reser_fecha_salida;
    } else {
        console.error("Uno o más elementos del formulario no se encontraron.");
    }

    tabla.parentElement.parentElement.style.display = 'none';

    btnGuardar.parentElement.style.display = 'none';
    btnGuardar.disabled = true;
    btnModificar.parentElement.style.display = '';
    btnModificar.disabled = false;
    btnCancelar.parentElement.style.display = '';
    btnCancelar.disabled = false;
};
const cancelar = () => {
    tabla.parentElement.parentElement.style.display = ''
    formulario.reset();
    btnGuardar.parentElement.style.display = ''
    btnGuardar.disabled = false;
    btnModificar.parentElement.style.display = 'none';
    btnModificar.disabled = true;
    btnCancelar.parentElement.style.display = 'none';
    btnCancelar.disabled = true;
};


const modificar = async (e) => {
    e.preventDefault();

    // Validar que todos los campos del formulario estén completos
    if (!validarFormulario(formulario)) {
        Swal.fire({
            title: "Campos vacíos",
            text: "Debe llenar todos los campos para continuar.",
            icon: "info",
            confirmButtonText: "Entendido"
        });
        return;
    }

    try {
        const body = new FormData(formulario);  // Recoge los datos del formulario
        const url = "/hotel/API/reservaciones/modificar";  // Asegúrate de que esta URL sea correcta
        const config = {
            method: 'POST',
            body
        };

        const respuesta = await fetch(url, config);  // Realiza la petición POST
        const data = await respuesta.json();  // Convierte la respuesta a JSON
        const { codigo, mensaje, detalle } = data;  // Extrae los campos de la respuesta

        let icon = 'info';  // Define el ícono de notificación predeterminado
        if (codigo === 1) {
            icon = 'success';  // Si la respuesta es exitosa, se cambia el ícono
            formulario.reset();  // Resetea el formulario
            cancelar();  // Llama a la función para restablecer los botones y el formulario
            buscar();  // Actualiza la tabla de reservaciones
        } else if (codigo === 0) {
            icon = 'error';  // En caso de error, muestra el ícono de error
            console.error(detalle);  // Opcional: muestra el detalle del error en la consola
        }

        // Muestra un SweetAlert con el resultado
        Swal.fire({
            icon: icon,
            title: mensaje,
            showConfirmButton: true
        });

    } catch (error) {
        // Captura cualquier error de la petición
        console.log(error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Ocurrió un error al modificar la reservación. Inténtalo nuevamente.',
            showConfirmButton: true
        });
    }
};
const eliminar = async (reservacion) => {
    const id = reservacion.currentTarget.dataset.reser_id;

    let confirmacion = await Swal.fire({
        title: '¿Está seguro de que desea eliminar esta reservación?',
        text: "Esta acción es irreversible.",
        icon: 'warning',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Sí, eliminar',
        denyButtonText: 'No, cancelar',
        confirmButtonColor: '#3085d6',
        denyButtonColor: '#d33',
        background: '#fff3e0',
        customClass: {
            title: 'custom-title-class',
            text: 'custom-text-class',
            confirmButton: 'custom-confirm-button',
            denyButton: 'custom-deny-button'
        }
    });

    if (confirmacion.isConfirmed) {
        try {
            const body = new FormData();
            body.append('reser_id', id);

            const url = '/hotel/API/reservaciones/eliminar';
            const config = {
                method: 'POST',
                body
            };

            const respuesta = await fetch(url, config);
            const data = await respuesta.json();
            const { codigo, mensaje, detalle } = data;

            if (codigo == 4) {
                Swal.fire({
                    title: '¡Éxito!',
                    text: mensaje,
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    background: '#e0f7fa',
                    customClass: {
                        title: 'custom-title-class',
                        text: 'custom-text-class'
                    }
                });
                // Restablecer el formulario y actualizar la tabla
                formulario.reset();
                cancelar(); // Resetea los botones y el formulario
                buscar(); // Actualiza la tabla de reservaciones
            } else {
                Swal.fire({
                    title: '¡Error!',
                    text: mensaje,
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    background: '#e0f7fa',
                    customClass: {
                        title: 'custom-title-class',
                        text: 'custom-text-class'
                    }
                });
            }
        } catch (error) {
            console.log(error);
        }
    }
};



  // Agrega alertas para mostrar si estan ocupadas
  document.getElementById('habi_id').addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];
    var isOcupada = selectedOption.getAttribute('data-ocupada') === 'true';

    if (isOcupada) {
        // Mostrar alerta con SweetAlert
        Swal.fire({
            icon: 'warning', // Tipo de ícono
            title: '¡Habitación Ocupada!',
            text: 'Esta habitación ya está reservada. Por favor, selecciona otra.',
            showConfirmButton: true, // Mostrar botón de confirmación
            confirmButtonText: 'Entendido', // Texto del botón de confirmación
            customClass: {
                popup: 'swal-wide' // Estilos personalizados si los necesitas
            }
        }).then(() => {
            // Una vez que se cierre el SweetAlert, limpiar el valor del select
            this.value = ''; // Reinicia el valor del select para que no se seleccione la habitación ocupada
        });
    }
});


// Inicializamos la búsqueda al cargar la página
// buscar();

// Asignamos los eventos a los botones
btnGuardar.addEventListener('click', guardar)
btnCancelar.addEventListener('click', cancelar)
btnModificar.addEventListener('click', modificar)
datatable.on('click', '.modificar', traerDatos)
datatable.on('click', '.eliminar', eliminar)
// datatable.on('click', '.btn-danger', eliminar);

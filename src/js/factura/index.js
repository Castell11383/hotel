import { Dropdown } from "bootstrap";
import { Toast, validarFormulario } from "../funciones";
import Swal from "sweetalert2";
import DataTable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje";


const formulario = document.getElementById('formFactura')
const tabla = document.getElementById('tablaFactura')
const btnGuardar = document.getElementById('btnGuardar')
const btnModificar = document.getElementById('btnModificar')
const btnCancelar = document.getElementById('btnCancelar')


let contador = 1;
const datatable = new DataTable('#tablaFactura', {
    data: null,
    language: lenguaje,
    pageLength: '15',
    lengthMenu: [3, 9, 11, 25, 100],
    columns: [
        {
            title: 'No.',
            data: 'deta_id',
            width: '2%',
            render: (data, type, row, meta) => {
                // console.log(meta.ro);
                return meta.row + 1;
            }
        },
        {
            title: 'Empleado',
            data: 'nombre_empleado'
        },
        {
            title: 'Cliente',
            data: 'nombre_cliente'
        },
        {
            title: 'Nit',
            data: 'nit_cliente'
        },
        {
            title: 'Habitacion',
            data: 'tipo_habitacion'
        },
        {
            title: 'Precio',
            data: 'precio_habitacion'
        },
        {
            title: 'Descripcion',
            data: 'descripcion_habitacion'
        },
        {
            title: 'Acciones',
            data: 'deta_id',
            searchable: false,
            orderable: false,
            render: (data, type, row, meta) => {
                let html = `
                <button class='btn btn-warning modificar' data-deta_id="${data}" data-nombre_empleado="${row.nombre_empleado}" data-nombre_cliente="${row.nombre_cliente}" data-precio_habitacion="${row.precio_habitacion}" data-saludo="hola mundo"><i class='bi bi-pencil-square'></i>Modificar</button>
                <button class='btn btn-danger eliminar' data-deta_id="${data}">Eliminar</button>
                <button class='btn btn-danger mostrarpdf' data-usuario='${data}'>PDF</button>
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

const guardar = async (e) => {
    e.preventDefault()

    if (!validarFormulario(formulario, ['deta_id'])) {
        Swal.fire({
            title: "Campos vacios",
            text: "Debe llenar todos los campos",
            icon: "info"
        })
        return
    }

    try {
        const body = new FormData(formulario)
        const url = "/hotel/API/factura/guardar"
        const config = {
            method: 'POST',
            body
        }

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { codigo, mensaje, detalle } = data;
        let icon = 'info'
        if (codigo == 1) {
            icon = 'success'
            formulario.reset();
            buscar();
        } else {
            icon = 'error'
            console.log(detalle);
        }

        Toast.fire({
            icon: icon,
            title: mensaje
        })

    } catch (error) {
        console.log(error);
    }
}


const buscar = async () => {
    try {
        const url = "/hotel/API/factura/buscar"
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

const traerDatos = (e) => {
    const elemento = e.currentTarget.dataset

    formulario.deta_id.value = elemento.deta_id
    formulario.nombre_empleado.value = elemento.nombre_empleado
    formulario.nombre_cliente.value = elemento.nombre_cliente
    formulario.precio_habitacion.value = elemento.precio_habitacion
    tabla.parentElement.parentElement.style.display = 'none'

    btnGuardar.parentElement.style.display = 'none'
    btnGuardar.disabled = true
    btnModificar.parentElement.style.display = ''
    btnModificar.disabled = false
    btnCancelar.parentElement.style.display = ''
    btnCancelar.disabled = false
}

const cancelar = () => {
    tabla.parentElement.parentElement.style.display = ''
    formulario.reset();
    btnGuardar.parentElement.style.display = ''
    btnGuardar.disabled = false
    btnModificar.parentElement.style.display = 'none'
    btnModificar.disabled = true
    btnCancelar.parentElement.style.display = 'none'
    btnCancelar.disabled = true
}

const modificar = async (e) => {
    e.preventDefault()

    if (!validarFormulario(formulario)) {
        Swal.fire({
            title: "Campos vacios",
            text: "Debe llenar todos los campos",
            icon: "info"
        })
        return
    }

    try {
        const body = new FormData(formulario)
        const url = "/hotel/API/factura/modificar"
        const config = {
            method: 'POST',
            body
        }

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { codigo, mensaje, detalle } = data;
        console.log(data);
        let icon = 'info'
        if (codigo == 1) {
            icon = 'success'
            formulario.reset();
            buscar();
            cancelar();
        } else {
            icon = 'error'
            console.log(detalle);
        }

        Toast.fire({
            icon: icon,
            title: mensaje
        })

    } catch (error) {
        console.log(error);
    }
}

const eliminar = async (factura) => {
    
    const id = factura.currentTarget.dataset.deta_id

    let confirmacion = await Swal.fire({
        title: '¿Está seguro de que desea eliminar este empleado?',
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
            const body = new FormData()
            body.append('deta_id', id)

            const url = '/hotel/API/factura/eliminar';
            const config = {
                method: 'POST',
                body
            }

            const respuesta = await fetch(url, config);
            const data = await respuesta.json();
            const { codigo, mensaje, detalle } = data

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
                formulario.reset();
                buscar();
            } else {
                Swal.fire({
                    title: '¡Error!',
                    text: mensaje,
                    icon: 'danger',
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
            console.log(error)
        }
    }
}

const generarPDF = async (e) => {
    const id = e.currentTarget.dataset.usuario;

    console.log(id)
    

    try {
        const body = new FormData();
        body.append('deta_id', id);

        const url = '/hotel/API/generarPDF';
        const config = {
            method: 'POST',
            body,
        };

        const respuesta = await fetch(url, config);

        // Procesa la respuesta como un blob (archivo binario)
        const blob = await respuesta.blob();

        // Crea una URL para el blob y abre el PDF en una nueva pestaña
        const urlBlob = window.URL.createObjectURL(blob);
        window.open(urlBlob, '_blank'); // Abre el PDF en una nueva pestaña

    } catch (error) {
        console.log('Error al generar el PDF:', error);
    }
};



formulario.addEventListener('submit', guardar)
btnCancelar.addEventListener('click', cancelar)
btnModificar.addEventListener('click', modificar)
datatable.on('click', '.modificar', traerDatos)
datatable.on('click', '.eliminar', eliminar)
datatable.on('click', '.mostrarpdf', generarPDF)

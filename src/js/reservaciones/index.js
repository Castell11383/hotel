import Swal from "sweetalert2";
import Datatable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje";
import { validarFormulario, Toast, confirmacion } from "../funciones";

const formulario = document.getElementById('form-reservacion');
const btnGuardar = document.getElementById('btnGuardar');
const divTabla = document.getElementById('tabla-reservaciones');

// Inicializamos el Datatable
let contador = 1;
const datatable = new Datatable('#tabla-reservaciones', {
    language: lenguaje,
    data: null,
    columns: [
        {
            title: 'NO',
            render: () => contador++
        },
        {
            title: 'CLIENTE',
            data: 'reser_cliente'
        },
        {
            title: 'HABITACION',
            data: 'reser_habitacion'
        },
        {
            title: 'ENTRADA',
            data: 'reser_fecha_entrada'
        },
        {
            title: 'SALIDA',
            data: 'reser_fecha_salida'
        }
    ]
});

// Función para buscar reservaciones y llenar la tabla
const buscar = async () => {
    const url = `/reservaciones/buscar`; // Cambia esta URL según tu ruta
    const config = {
        method: 'GET'
    };

    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();

        datatable.clear().draw();
        if (data) {
            contador = 1;
            datatable.rows.add(data).draw();
        } else {
            Toast.fire({
                title: 'No se encontraron registros',
                icon: 'info'
            });
        }
    } catch (error) {
        console.log(error);
    }
};

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
    const url = '/reservaciones/guardar'; // Cambia esta URL según tu ruta
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
};

// Función para eliminar una reservación
const eliminar = async (e) => {
    const button = e.target;
    const id = button.dataset.id;

    if (await confirmacion('warning', '¿Desea eliminar este registro?')) {
        const body = new FormData();
        body.append('reserva_id', id);
        const url = '/reservaciones/eliminar'; // Cambia esta URL según tu ruta
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
    }
};

// Inicializamos la búsqueda al cargar la página
buscar();

// Asignamos los eventos a los botones
btnGuardar.addEventListener('click', guardar);
datatable.on('click', '.btn-danger', eliminar);

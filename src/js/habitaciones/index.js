import Swal from "sweetalert2";
import Datatable from "datatables.net-bs5";
import { validarFormulario, Toast } from "../funciones";

// Variables del formulario
const formulario = document.querySelector('#reserva-form');
const btnGuardar = document.getElementById('guardar-reserva-btn');

// Deshabilitar el botón de guardar hasta que se muestre el formulario de confirmación
btnGuardar.disabled = true;

// Configuración inicial de la tabla
let contador = 1;
const datatable = new Datatable('#tablaReservaciones', {
    language: lenguaje,
    data: null,
    columns: [
        {
            title: 'NO',
            render: () => contador++
        },
        {
            title: 'ID Cliente',
            data: 'reser_cliente'
        },
        {
            title: 'ID Habitación',
            data: 'reser_habitacion'
        },
        {
            title: 'Fecha Entrada',
            data: 'reser_fecha_entrada'
        },
        {
            title: 'Fecha Salida',
            data: 'reser_fecha_salida'
        },
        {
            title: 'Situación',
            data: 'reser_situacion',
            render: function(data) {
                const estados = {
                    1: "Activa",
                    0: "Inactiva"
                };
                return estados[data] || "Desconocida";
            }
        }
    ]
});

// Función para mostrar alertas con SweetAlert
const mostrarAlerta = (icono, mensaje) => {
    Swal.fire({
        icon: icono,
        title: mensaje,
        showConfirmButton: false,
        timer: 2000
    });
};

// Función para confirmar reservación
const confirmarReservacion = async (evento) => {
    evento.preventDefault();

    if (!validarFormulario(formulario)) {
        mostrarAlerta('info', 'Debe llenar todos los datos');
        return;
    }

    const habitacionId = formulario.habi_id.value;
    const clienteId = formulario.clie_id.value;
    const fechaEntrada = formulario.reser_fecha_entrada.value;
    const fechaSalida = formulario.reser_fecha_salida.value;

    try {
        const respuesta = await fetch('/confirmar-reservacion', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                habi_id: habitacionId,
                clie_id: clienteId,
                reser_fecha_entrada: fechaEntrada,
                reser_fecha_salida: fechaSalida
            })
        });

        const html = await respuesta.text();
        document.body.innerHTML = html; // Mostrar formulario de confirmación
        btnGuardar.disabled = false; // Habilitar el botón de guardar
    } catch (error) {
        console.error('Error al confirmar la reservación:', error);
        mostrarAlerta('error', 'Error al confirmar la reservación');
    }
};

// Función para guardar reservación
const guardarReservacion = async (evento) => {
    evento.preventDefault();

    const habitacionId = formulario.habi_id.value;
    const clienteId = formulario.clie_id.value;
    const fechaEntrada = formulario.reser_fecha_entrada.value;
    const fechaSalida = formulario.reser_fecha_salida.value;

    try {
        const respuesta = await fetch('/guardar-reservacion', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                habi_id: habitacionId,
                clie_id: clienteId,
                reser_fecha_entrada: fechaEntrada,
                reser_fecha_salida: fechaSalida
            })
        });

        const data = await respuesta.json();
        const { codigo, mensaje } = data;

        if (codigo === 1) {
            formulario.reset();
            mostrarAlerta('success', 'Reservación guardada correctamente');

            // Recargar la tabla con las reservaciones
            const nuevasReservaciones = await fetch('/obtener-reservaciones');
            const reservaciones = await nuevasReservaciones.json();
            datatable.clear().rows.add(reservaciones).draw();

        } else {
            mostrarAlerta('error', mensaje || 'Error al guardar la reservación');
        }
    } catch (error) {
        console.error('Error al guardar la reservación:', error);
        mostrarAlerta('error', 'Error al guardar la reservación');
    }
};

// Eventos
formulario.addEventListener('submit', confirmarReservacion);
btnGuardar.addEventListener('click', guardarReservacion);

// Inicializar la tabla al cargar la página
const cargarReservaciones = async () => {
    try {
        const respuesta = await fetch('/obtener-reservaciones');
        const data = await respuesta.json();
        datatable.clear().rows.add(data).draw();
    } catch (error) {
        console.error('Error al cargar las reservaciones:', error);
    }
};

cargarReservaciones();

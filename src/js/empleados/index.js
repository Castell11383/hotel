import { Dropdown, Tab } from "bootstrap";
import { Toast, validarFormulario } from "../funciones";
import Swal from "sweetalert2";
import DataTable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje";

const formulario = document.getElementById('formularioEmpleado');
const TablaEmpleados = document.getElementById('tablaEmpleados');
const BtnGuardar = document.getElementById('BtnGuardar');
const BtnModificar = document.getElementById('BtnModificar');
const BtnCancelar = document.getElementById('BtnCancelar');

TablaEmpleados.classList.add('d-none');
BtnModificar.parentElement.classList.add('d-none');
BtnCancelar.parentElement.classList.add('d-none');

let contador = 1;
const datatable = new DataTable('#tablaEmpleados', {
    data: null,
    language: lenguaje,
    columns: [
        {
            title: 'No.',
            data: 'emp_id',
            width: '2%',
            render: (data, type, row, meta) => {
                return meta.row + 1;
            }
        },
        {
            title: 'Nombres',
            data: 'emp_nombres'
        },
        {
            title: 'Apellidos',
            data: 'emp_apellidos'
        },
        {
            title: 'Telefono',
            data: 'emp_telefono'
        },
        {
            title: 'Cargo',
            data: 'emp_cargo'
        },
        {
            title: 'Genero',
            data: 'emp_genero'
        },
        {
            title: 'Opciones',
            data: 'emp_id',
            searchable: false,
            orderable: false,
            render: (data, type, row, meta) => {
                let html = `
                <button class='btn btn-warning modificar' data-emp_id="${data}" data-emp_nombres="${row.emp_nombres}" data-emp_apellidos="${row.emp_apellidos}" data-emp_cargo="${row.emp_cargo}" data-emp_telefono="${row.emp_telefono}" data-emp_genero="${row.emp_genero}"><i class='bi bi-pencil-square'></i></button>
                
                <button class='btn btn-error bg-danger eliminar' data-emp_id="${data}"><i class="bi bi-trash-fill"></i></button>
                `
                return html;
            }
        }
    ]
});

const guardar = async (e) => {
    e.preventDefault();

    BtnGuardar.disabled = true;

    if (!validarFormulario(formulario, ['emp_id'])) {
        Swal.fire({
            title: "Campos vacios",
            text: "Debe llenar todos los campos",
            icon: "question"
        })
        BtnGuardar.disabled = false;
        return
    }

    try {
        const body = new FormData(formulario)
        const url = '/hotel/API/empleado/guardar';

        const config = {
            method: 'POST',
            body
        }

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { codigo, mensaje, detalle } = data

        if (codigo == 1) {

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
            Buscar();
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
        console.log(error)
    }
    BtnGuardar.disabled = false;

}

const Buscar = async () => {

    const url = '/hotel/API/empleado/buscar';

    const config = {
        method: 'GET'
    }

    const respuesta = await fetch(url, config);
    const data = await respuesta.json();

    datatable.clear().draw();
    if(data && data.length > 0){
        TablaEmpleados.classList.remove('d-none');
        datatable.rows.add(data).draw();
    }
}

const llenarDatos = (empleados) => {

    const datos = empleados.currentTarget.dataset

    TablaEmpleados.parentElement.parentElement.classList.add('d-none');
    BtnGuardar.parentElement.classList.add('d-none');
    BtnModificar.parentElement.classList.remove('d-none');
    BtnCancelar.parentElement.classList.remove('d-none');

    formulario.emp_id.value = datos.emp_id;
    formulario.emp_nombres.value = datos.emp_nombres;
    formulario.emp_apellidos.value = datos.emp_apellidos;
    formulario.emp_telefono.value = datos.emp_telefono;
    formulario.emp_genero.value = datos.emp_genero;
    formulario.emp_cargo.value = datos.emp_cargo;
}

const Cancelar = () => {

    TablaEmpleados.parentElement.parentElement.classList.remove('d-none');
    BtnGuardar.parentElement.classList.remove('d-none');
    BtnModificar.parentElement.classList.add('d-none');
    BtnCancelar.parentElement.classList.add('d-none');

    formulario.reset();
    formulario.emp_nombres.removeAttribute('readonly');
    formulario.emp_apellidos.removeAttribute('readonly');
    formulario.emp_telefono.removeAttribute('readonly');
    formulario.emp_cargo.removeAttribute('readonly');
    formulario.emp_genero.removeAttribute('readonly');
    Buscar();
}

const Modificar = async (e) => {
    e.preventDefault()

    if (!validarFormulario(formulario)) {
        Swal.fire({
            title: "Campos vacios",
            text: "Debe llenar todos los campos",
            icon: "question"
        })
        return
    }

    try {
        const body = new FormData(formulario)
        const url = '/hotel/API/empleado/modificar';

        const config = {
            method: 'POST',
            body
        }

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { codigo, mensaje, detalle } = data

        if (codigo == 3) {

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
            Cancelar();
            Buscar();
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

const Eliminar = async (empleados) => {

    const id = empleados.currentTarget.dataset.emp_id

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
            body.append('emp_id', id)

            const url = '/hotel/API/empleado/eliminar';
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
                Buscar();
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
            console.log(error)
        }
    }
}


Buscar();
BtnCancelar.addEventListener('click', Cancelar);
formulario.addEventListener('submit', guardar);
BtnModificar.addEventListener('click', Modificar);


datatable.on('click', '.modificar', llenarDatos)
datatable.on('click', '.eliminar', Eliminar)
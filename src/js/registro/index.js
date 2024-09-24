import { Dropdown } from "bootstrap";
import { Toast, validarFormulario } from "../funciones";
import Swal from "sweetalert2";
import DataTable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje";


const formulario = document.getElementById('formRegistro')
const btnGuardar = document.getElementById('btnGuardar')
const btnLimpiar = document.getElementById('btnLimpiar')



const guardar = async (e) => {
    e.preventDefault()

    if (!validarFormulario(formulario, ['clie_id'])) {
        Swal.fire({
            title: "Campos vacios",
            text: "Debe llenar todos los campos",
            icon: "info"
        })
        return
    }

    try {
        const body = new FormData(formulario)
        const url = "/hotel/API/registro/guardar"
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

const cancelar = () => {
    formulario.reset(); // Limpia el formulario
    btnGuardar.parentElement.style.display = ''; // Muestra el botón de guardar
    btnLimpiar.disabled = false; // Habilita el botón de limpiar
};

formulario.addEventListener('submit', guardar);
btnLimpiar.addEventListener('click', cancelar);



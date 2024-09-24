const { default: Swal } = require("sweetalert2");
const { validarFormulario } = require("../funciones");

const formulario = document.querySelector('form')

const IniciarSesion = async (e) => {
    e.preventDefault();
    
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
        const url = '/hotel/API/login';
        
        const config = {
            method: 'POST',
            body
        }    

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { codigo, mensaje, detalle } = data

     

        if (codigo == 1) {

            // Swal.fire({
            //     title: '¡Éxito!',
            //     text: mensaje,
            //     icon: 'success',
            //     showConfirmButton: false,
            //     timer: 1500,
            //     timerProgressBar: true,
            //     background: '#e0f7fa',
            //     customClass: {
            //         title: 'custom-title-class',
            //         text: 'custom-text-class'
            //     }

            // });  
            formulario.reset();
             location.href = '/hotel/inicio'
        } else {
            Swal.fire({
                title: '¡Error!',
                text: mensaje,
                icon: 'warning',
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

formulario.addEventListener('submit', IniciarSesion)
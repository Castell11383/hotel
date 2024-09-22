document.addEventListener('DOMContentLoaded', function() {
    const botonesReservar = document.querySelectorAll('.btn-reservar');

    botonesReservar.forEach(boton => {
        boton.addEventListener('click', function() {
            const habitacionId = this.getAttribute('data-habitacion-id');
            const habitacionTipo = this.getAttribute('data-habitacion-tipo');
            const habitacionPrecio = this.getAttribute('data-habitacion-precio');

            window.location.href = `/hotel/reservaciones/detalle?id=${habitacionId}&tipo=${habitacionTipo}&precio=${habitacionPrecio}`;
        });
    });
});
    
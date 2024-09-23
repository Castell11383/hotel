document.addEventListener('DOMContentLoaded', function () {
    const botonesReservar = document.querySelectorAll('.btn-reservar');


 
    document.querySelectorAll('.habitacion-card img').forEach(img => {
        img.addEventListener('mouseover', () => {
            img.style.transform = 'scale(1.1)';
        });
        img.addEventListener('mouseout', () => {
            img.style.transform = 'scale(1)';
        });
    });


    botonesReservar.forEach(boton => {
        boton.addEventListener('click', function () {
            const habitacionId = this.getAttribute('data-habitacion-id');
            const habitacionTipo = this.getAttribute('data-habitacion-tipo');
            const habitacionPrecio = this.getAttribute('data-habitacion-precio');

            window.location.href = `/hotel/reservaciones/detalle?id=${habitacionId}&tipo=${habitacionTipo}&precio=${habitacionPrecio}`;
        });
    });
});

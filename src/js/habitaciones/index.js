document.addEventListener('DOMContentLoaded', function () {
    const botonesReservar = document.querySelectorAll('.btn-reservar');

    // Animación para las imágenes al hacer hover
    document.querySelectorAll('.habitacion-card img').forEach(img => {
        img.addEventListener('mouseover', () => {
            img.style.transform = 'scale(1.1)';
        });
        img.addEventListener('mouseout', () => {
            img.style.transform = 'scale(1)';
        });
    });

    // Evento para redirigir al formulario de reservación cuando se hace clic en "Reservar"
    botonesReservar.forEach(boton => {
        boton.addEventListener('click', function () {
            const habitacionId = this.getAttribute('data-habitacion-id');
            const habitacionTipo = this.getAttribute('data-habitacion-tipo');
            const habitacionPrecio = this.getAttribute('data-habitacion-precio');

            // Redirigir al formulario de reservación con los datos de la habitación en la URL
            window.location.href = `/hotel/reservaciones/detalle?habi_id=${habitacionId}&habi_tipo=${habitacionTipo}&habi_precio=${habitacionPrecio}`;
        });
    });
});

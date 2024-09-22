<h1 class="text-center">Habitaciones</h1>

<div class="habitaciones row">
    <?php foreach($habitaciones as $habitacion) { ?>
        <div class="habitacion-card col-md-4 mb-4" data-habitacion-id="<?php echo htmlspecialchars($habitacion['habi_id']); ?>">
            <img src="<?php echo htmlspecialchars($habitacion['habi_imagen']); ?>" alt="<?php echo htmlspecialchars($habitacion['habi_tipo']); ?>" class="img-fluid">
            <h2 class="mt-2"><?php echo htmlspecialchars($habitacion['habi_tipo']); ?></h2>
            <p><?php echo htmlspecialchars($habitacion['habi_descripcion']); ?></p>
            <p><strong>Precio: $<?php echo htmlspecialchars($habitacion['habi_precio']); ?></strong></p>

     
            <!-- Botón de Reservar -->
            <a href="/hotel/reservacion/detalle?id=<?php echo htmlspecialchars($habitacion['habi_id']); ?>" class="btn btn-primary">
                Reservar
            </a>
        </div>
    <?php } ?>
</div>
x
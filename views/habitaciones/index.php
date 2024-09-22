<style>
.habitacion-card img {
    transition: transform 0.3s ease-in-out;
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-radius: 10px;
    margin-left: 1cm;
}

.habitacion-card img:hover {
    transform: scale(1.1);
}

.habitacion-card h2 {
    font-family: 'Montserrat', sans-serif;
    font-size: 1.5rem;
    font-weight: bold;
    text-align: center;
    color: #333;
}

.habitacion-card p {
    font-family: 'Open Sans', sans-serif;
    font-size: 1rem;
    text-align: center;
    color: #555;
}

.habitacion-card strong {
    font-size: 1.2rem;
    color: #000;
}

.btn-reservar {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn-reservar:hover {
    background-color: #0056b3;
}

.btn-reservar i {
    margin-right: 10px;
}


</style>



<h1 class="text-center">Habitaciones</h1>

<div class="habitaciones row">
    <?php foreach($habitaciones as $habitacion) { ?>
        <div class="habitacion-card col-md-4 mb-4" data-habitacion-id="<?php echo htmlspecialchars($habitacion['habi_id']); ?>">
            <img src="<?php echo htmlspecialchars($habitacion['habi_imagen']); ?>" alt="<?php echo htmlspecialchars($habitacion['habi_tipo']); ?>" class="img-fluid">
            <h2 class="mt-2"><?php echo htmlspecialchars($habitacion['habi_tipo']); ?></h2>
            <p><?php echo htmlspecialchars($habitacion['habi_descripcion']); ?></p>
            <p><strong>Precio: $<?php echo htmlspecialchars($habitacion['habi_precio']); ?></strong></p>

            <?php if ($habitacion['situacion'] == 1) { ?>
                <!-- Si la habitación ya está reservada, deshabilitar el botón -->
                <button class="btn btn-secondary" disabled>Reservada</button>
            <?php } else { ?>
                <!-- Botón de Reservar con ícono, habilitado si la situación es distinta de 1 -->
                <button 
                    class="btn btn-reservar" 
                    data-habitacion-id="<?php echo htmlspecialchars($habitacion['habi_id']); ?>"
                    data-habitacion-tipo="<?php echo htmlspecialchars($habitacion['habi_tipo']); ?>"
                    data-habitacion-precio="<?php echo htmlspecialchars($habitacion['habi_precio']); ?>">
                    <i class="fas fa-calendar-check"></i> Reservar
                </button>
            <?php } ?>
        </div>
    <?php } ?>
</div>
<script src="<?= asset('/build/js/habitaciones/index.js') ?>"></script>
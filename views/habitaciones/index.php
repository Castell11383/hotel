<div class="row mb-3 justify-content-center text-center">
    <div class="col-lg-10">
    <h1 class="text-center mb-5" style="font-family: 'Playwrite DE Grund', sans-serif; font-size: 4rem; font-weight: bold; color: #333;">Habitaciones</h1>
        <div class="habitaciones row">
            <?php foreach ($habitaciones as $habitacion) { ?>
                <div class="habitacion-card col-md-4 mb-4"
                    data-habitacion-id="<?php echo htmlspecialchars($habitacion['habi_id']); ?>"
                    style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 15px; overflow: hidden; background-color: #fff; transition: transform 0.3s ease;">

                    <img src="<?php echo htmlspecialchars($habitacion['habi_imagen']); ?>" alt="<?php echo htmlspecialchars($habitacion['habi_tipo']); ?>" class="img-fluid" style="transition: transform 0.3s ease-in-out; width: 100%; height: 250px; object-fit: cover; border-radius: 10px;">
                    <h2 style="font-family: 'Montserrat', sans-serif; font-size: 1.5rem; font-weight: bold; text-align: center; color: #333; margin-top: 15px;"><?php echo htmlspecialchars($habitacion['habi_tipo']); ?></h2>

                    <p style="font-family: 'Open Sans', sans-serif; font-size: 1rem; text-align: center; color: #555; margin: 10px 0;"><?php echo htmlspecialchars($habitacion['habi_descripcion']); ?></p>

                    <p style="font-size: 1.2rem; color: #000; text-align: center;"><strong>Precio: $<?php echo htmlspecialchars($habitacion['habi_precio']); ?></strong></p>

                    <?php if ($habitacion['situacion'] == 1) { ?>
                        <button class="btn btn-secondary btn-sm w-50 mx-auto" style="padding: 5px 10px; margin-top: 10px;" disabled>
                            Reservada
                        </button>
                    <?php } else { ?>
                        <button class="btn btn-reservar btn-sm w-50 mx-auto mb-3"
                            style="background-color: #007bff; color: white; padding: 5px 10px; border-radius: 5px;"
                            data-habitacion-id="<?php echo htmlspecialchars($habitacion['habi_id']); ?>"
                            data-habitacion-tipo="<?php echo htmlspecialchars($habitacion['habi_tipo']); ?>"
                            data-habitacion-precio="<?php echo htmlspecialchars($habitacion['habi_precio']); ?>">
                            <i class="fas fa-calendar-check"></i> Reservar
                        </button>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script src="<?= asset('/build/js/habitaciones/index.js') ?>"></script>
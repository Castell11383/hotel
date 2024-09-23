<div class="row justify-content-center mb-5 text-center">
    <form class="col-lg-4 border bg-light p-3 rounded" id="form-reservacion">
        <h2 class="text-center">Reservar una Habitación</h2>
        <i class="bi bi-house-exclamation-fill" style="font-size: 5rem;"></i>
        <input type="hidden" name="reser_id" id="reser_id"> <!-- Este campo debe tener el mismo nombre que en el controlador -->
        <div class="row mb-3">
            <div class="col-8">
                <label for="habi_id">Detalles de la Habitación:</label>
                <select name="habi_id" id="habi_id" class="form-control">
                    <?php foreach ($habitaciones as $habitacion): ?>
                        <option value="<?php echo htmlspecialchars($habitacion['habi_id']); ?>">
                            <?php echo htmlspecialchars($habitacion['habi_tipo']); ?> - $<?php echo htmlspecialchars($habitacion['habi_precio']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <label for="clie_id">ID del Cliente:</label>
                <input type="text" id="clie_id" name="clie_id" value="<?php echo htmlspecialchars($cliente); ?>" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="reser_fecha_entrada">Fecha de Entrada:</label>
                <input id="reser_fecha_entrada" type="datetime-local" name="reser_fecha_entrada" class="form-control" required>
            </div>
            <div class="col">
                <label for="reser_fecha_salida">Fecha de Salida:</label>
                <input type="datetime-local" id="reser_fecha_salida" name="reser_fecha_salida" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3 justify-content-center text-center">
            <div class="col-lg-5">
                <button type="submit" id="btnGuardar" class="btn btn-primary w-100">Guardar Reservacion</button>
            </div>
            <div class="col-lg-5">
                <button type="button" id="btnModificar" class="btn btn-warning w-100">Modificar</button>
            </div>
            <div class="col-lg-5">
                <button type="button" id="btnCancelar" class="btn btn-danger w-100">Cancelar</button>
            </div>
        </div>
    </form>
</div>

<!-- Mensaje de éxito/error -->
<div id="mensaje"></div>





<div class="row justify-content-center mt-5">
    <div class="col table-responsive col-lg-11 table-wrapper border shadow bg-light rounded">
        <table class="table table-bordered table-hover w-100 text-center shadow" id="tabla-reservaciones"></table>
    </div>
</div>

<!-- Tabla de reservaciones -->

<script src="<?= asset('/build/js/reservaciones/index.js') ?>"></script>
<?php

use Model\Cliente;

$cliente = new Cliente($_GET);
$clientes = $cliente->buscar()
?>

<div class="row justify-content-center mb-5">
    <form class="col-lg-5 border bg-light p-3 text-center rounded" id="form-reservacion">
        <h1 class="text-center">Reservación</h1>
        <i class="bi bi-file-earmark-medical-fill" style="font-size: 5rem;"></i>
        <input type="hidden" name="reser_id" id="reser_id">
        <div class="row mb-3">
            <div class="col">
                <label for="clie_id">Cliente</label>
                <select name="clie_id" id="clie_id" class="form-control">
                    <option value="">SELECCIONE...</option>
                    <?php foreach ($clientes as $cliente) : ?>
                        <option value="<?= $cliente['clie_id'] ?>"> <?= $cliente['clie_nombres'] ?> <?= $cliente['clie_apellidos'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col">
                <label for="habi_id">Detalles</label>
                <select name="habi_id" id="habi_id" class="form-control">
                    <?php foreach ($habitaciones as $habitacion): ?>
                        <option
                            value="<?php echo htmlspecialchars($habitacion['habi_id']); ?>"
                            data-ocupada="<?= in_array($habitacion['habi_id'], array_column($habitacionesOcupadas, 'reser_habitacion')) ? 'true' : 'false' ?>">
                            <?php echo htmlspecialchars($habitacion['habi_id']); ?>
                            <?php echo htmlspecialchars($habitacion['habi_tipo']); ?> - $<?php echo htmlspecialchars($habitacion['habi_precio']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="reser_fecha_entrada">Entrada:</label>
                <input id="reser_fecha_entrada" type="datetime-local" name="reser_fecha_entrada" class="form-control" required>
            </div>
            <div class="col">
                <label for="reser_fecha_salida">Salida:</label>
                <input type="datetime-local" id="reser_fecha_salida" name="reser_fecha_salida" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3 justify-content-center text-center">
            <div class="col-lg-5">
                <button type="submit" id="btnGuardar" class="btn btn-primary w-100">Guardar</button>
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

<div id="mensaje"></div>

<div class="row justify-content-center mt-5">
    <div class="col table-responsive col-lg-10 table-wrapper border shadow bg-light rounded">
        <table class="table table-bordered table-hover w-100 text-center shadow" id="tabla-reservaciones"></table>
    </div>
</div>

<script src="<?= asset('/build/js/reservaciones/index.js') ?>"></script>
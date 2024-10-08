<?php

use Model\Empleado;
use Model\Reservacion;

$empleado = new Empleado($_GET);
$empleados = $empleado->buscar();

$reservacion = new Reservacion($_GET);
$reservaciones = $reservacion->buscar();

?>

<div class="row justify-content-center mb-4 mt-5">
    <form id="formFactura" class="border bg-light shadow rounded p-4 col-lg-5 text-center">
        <h1 class="text-center">Generar Factura</h1>
        <i class="bi bi-file-text-fill" style="font-size: 5rem;"></i>
        <input type="hidden" name="deta_id" id="deta_id">
        <div class="row mb-3">
            <div class="col">
                <label for="deta_empleado">Empleado</label>
                <select class="form-select" name="deta_empleado" id="deta_empleado" class="form-control">
                    <option value="">SELECCIONE...</option>
                    <?php foreach ($empleados as $empleado) : ?>
                        <option value="<?= $empleado['emp_id'] ?>"> <?= $empleado['emp_nombres'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col">
                <label for="deta_reservacion">Cliente</label>
                <select class="form-select" name="deta_reservacion" id="deta_reservacion" class="form-control">
                    <option value="">SELECCIONE...</option>
                    <?php foreach ($reservaciones as $reservacion) : ?>
                        <option value="<?= $reservacion['reser_id'] ?>" > <?= $reservacion['clie_nombres'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        
        <div class="row mb-3 justify-content-center">
            <div class="col-lg-7">
                <label for="deta_total">Total</label>
                <input type="text" name="deta_total" id="deta_total" class="form-control">
            </div>
        </div> 
     
        <div class="row justify-content-center text-center">
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
<div class="row justify-content-center text-center mt-5">
    <div class="col-lg-10 table-responsive col-lg-11 table-wrapper border shadow bg-light rounded">
        <table class="table table-bordered table-hover w-100 text-center shadow" id="tablaFactura">
        </table>
    </div>
</div>

<script src="<?= asset('./build/js/factura/index.js') ?>"></script>
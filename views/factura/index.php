<?php

use Model\Empleado;
use Model\Reservacion;

$empleado = new Empleado($_GET);
$empleados = $empleado->buscar();

$reservacion = new Reservacion($_GET);
$reservaciones = $reservacion->buscar();

?>

<h1 class="text-center">Formulario para Generar Facturas</h1>
<div class="row justify-content-center mb-4">
    <form id="formFactura" class="border shadow p-4 col-lg-4">
        <input type="hidden" name="deta_id" id="deta_id">
       

        <div class="row mb-3">
            <div class="col">
                <label for="nombre_empleado">empleado que genera la factura</label>
                <select name="nombre_empleado" id="nombre_empleado" class="form-control">
                    <option value="">SELECCIONE...</option>
                    <?php foreach ($empleados as $empleado) : ?>
                        <option value="<?= $empleado['emp_id'] ?>"> <?= $empleado['emp_nombres'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>

       
        <div class="row mb-3">
            <div class="col">
                <label for="nombre_cliente">Reservacion echa por el cliente</label>
                <select name="nombre_cliente" id="nombre_cliente" class="form-control">
                    <option value="">SELECCIONE...</option>
                    <?php foreach ($reservaciones as $reservacion) : ?>
                        <option value="<?= $reservacion['reser_id'] ?>"> <?= $reservacion['clie_nombres'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col">
                <label for="precio_habitacion">total a pagar</label>
                <input type="hedden" name="precio_habitacion" id="precio_habitacion" class="form-control">
            </div>
        </div> 
     
        <div class="row">
            <div class="col">
                <button type="submit" id="btnGuardar" class="btn btn-primary w-100">Guardar</button>
            </div>
            <div class="col">
                <button type="button" id="btnModificar" class="btn btn-warning w-100">Modificar</button>
            </div>
            <div class="col">
                <button type="button" id="btnCancelar" class="btn btn-danger w-100">Cancelar</button>
            </div>
        </div>
    </form>
</div>
<div class="row">
    <div class="col table-responsive">
        <table class="table table-bordered table-hover w-100" id="tablaFactura">
        </table>
    </div>
</div>
<script src="<?= asset('./build/js/factura/index.js') ?>"></script>
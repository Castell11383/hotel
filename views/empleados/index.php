<div class="row justify-content-center text-center">
    <form class="border bg-light shadow rounded p-4 col-lg-5" id="formularioEmpleado">
        <h2 class="text-center mb-3"><b>Registro de Empleados</b></h2>
        <i class="bi bi-person-circle" style="font-size: 5rem;"></i>
        <input type="hidden" name="emp_id" id="emp_id">
        <div class="row mb-3">
            <div class="col">
                <label for="emp_nombres">Nombres</label>
                <input type="text" name="emp_nombres" id="emp_nombres" class="form-control" required>
            </div>

            <div class="col">
                <label for="emp_apellidos">Apellidos</label>
                <input type="text" name="emp_apellidos" id="emp_apellidos" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="emp_genero">Género</label>
                <select class="form-select" name="emp_genero" id="emp_genero" class="form-control" required>
                    <option selected>Seleccione...</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>

            <div class="col">
                <label for="emp_telefono">Telefono</label>
                <input type="number" name="emp_telefono" id="emp_telefono" class="form-control" required>
            </div>

            <div class="col">
                <label for="emp_cargo">Cargo</label>
                <select class="form-select" name="emp_cargo" id="emp_cargo" class="form-control" required>
                    <option selected>Seleccione...</option>
                    <option value="Gerente">Gerente</option>
                    <option value="Limpieza">Limpieza</option>
                    <option value="Cocinero">Cocinero</option>
                    <option value="Recepcionista">Recepcionista</option>
                    <option value="Seguridad">Seguridad</option>
                    <option value="Botones">Botones</option>
                </select>
            </div>
        </div>

        <div class="row mb-3 justify-content-center text-center ">
            <div class="col-lg-5">
                <button type="submit" id="BtnGuardar" class="btn btn-primary w-100">Guardar</button>
            </div>
            <div class="col-lg-5">
                <button type="button" id="BtnModificar"
                    class="btn btn-warning w-100 text-uppercase shadow border-0">Modificar</button>
            </div>
            <div class="col-lg-5">
                <button type="button" id="BtnCancelar"
                    class="btn btn-secondary w-100 text-uppercase shadow border-0">Cancelar</button>
            </div>
        </div>
    </form>
</div>

<div class="row justify-content-center mt-5">
    <div class="col table-responsive col-lg-11 table-wrapper border shadow bg-light rounded">
        <table class="table table-bordered table-hover w-100 text-center shadow" id="tablaEmpleados"></table>
    </div>
</div>

<script src="<?= asset('./build/js/empleados/index.js') ?>"></script>
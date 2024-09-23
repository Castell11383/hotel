<div class="row justify-content-center text-center">
    <form id="formCliente" class="border bg-light shadow rounded p-4 col-lg-6">
        <h1 class="text-center">Registro de Clientes</h1>
        <i class="bi bi-person-vcard-fill" style="font-size: 5rem;"></i>
        <input type="hidden" name="clie_id" id="clie_id">
        <div class="row mb-3">
            <div class="col">
                <label for="clie_nombres">Nombre</label>
                <input type="text" name="clie_nombres" id="clie_nombres" class="form-control">
            </div>
            <div class="col">
                <label for="clie_apellidos">Apellidos</label>
                <input type="text" name="clie_apellidos" id="clie_apellidos" class="form-control">
            </div>
            <div class="col-3">
                <label for="emp_genero">Género</label>
                <select class="form-select" name="emp_genero" id="emp_genero" class="form-control" required>
                    <option selected>Seleccione...</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="clie_correo">Correo Electronico</label>
                <input type="email" name="clie_correo" id="clie_correo" class="form-control" require>
            </div>
            <div class="col">
                <label for="clie_direccion">Direccion</label>
                <input type="text" name="clie_direccion" id="clie_direccion" class="form-control" require>
            </div>

        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="clie_telefono">Teléfono</label>
                <input type="number" name="clie_telefono" id="clie_telefono" class="form-control" require>
            </div>
            <div class="col">
                <label for="clie_pais">Pais</label>
                <input type="text" name="clie_pais" id="clie_pais" class="form-control" require>
            </div>
            <div class="col">
                <label for="clie_nit">Nit</label>
                <input type="number" name="clie_nit" id="clie_nit" class="form-control"require>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="clie_password">Password</label>
                <input type="password" name="clie_password" id="clie_password" class="form-control" require>
            </div>
            <div class="col">
                <label for="clie_password2">Confirmar Password</label>
                <input type="password" name="clie_password2" id="clie_password2" class="form-control" require>
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

<div class="row justify-content-center mt-5">
    <div class="col table-responsive col-lg-11 table-wrapper border shadow bg-light rounded">
        <table class="table table-bordered table-hover w-100 text-center shadow" id="tablaCliente"></table>
    </div>
</div>

<script src="<?= asset('./build/js/cliente/index.js') ?>"></script>
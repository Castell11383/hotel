<h1 class="text-center">Formulario para Ingresar Clientes</h1>
<div class="row justify-content-center mb-4">
    <form id="formCliente" class="border shadow p-4 col-lg-4">
        <input type="hidden" name="clie_id" id="clie_id">
        <div class="row mb-3">
            <div class="col">
                <label for="clie_nombres">Nombre del Cliente</label>
                <input type="text" name="clie_nombres" id="clie_nombres" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="clie_apellidos">Pellidos del Cliente</label>
                <input type="text" name="clie_apellidos" id="clie_apellidos" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="clie_genero">Género</label>
                <select name="clie_genero" id="clie_genero" class="form-control">
                    <option value="">Seleccione género</option>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="clie_correo">Correo Electronico</label>
                <input type="email" name="clie_correo" id="clie_correo" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="clie_direccion">Direccion</label>
                <input type="text" name="clie_direccion" id="clie_direccion" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="clie_telefono">TELEFONO</label>
                <input type="number" name="clie_telefono" id="clie_telefono" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="clie_pais">Pais</label>
                <input type="text" name="clie_pais" id="clie_pais" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="clie_nit">NIT</label>
                <input type="number" name="clie_nit" id="clie_nit" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="clie_password">Password</label>
                <input type="password" name="clie_password" id="clie_password" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="clie_password2">Confirmar Password</label>
                <input type="password" name="clie_password2" id="clie_password2" class="form-control">
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
        <table class="table table-bordered table-hover w-100" id="tablaCliente">
        </table>
    </div>
</div>
<script src="<?= asset('./build/js/cliente/index.js') ?>"></script>
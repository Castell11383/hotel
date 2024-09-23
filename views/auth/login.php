<h1 class="text-center mb-5">Bienvenido al Portal</h1>
<div class="row justify-content-center">
    <form class="col-lg-4 border rounded shadow p-4 bg-light">
        <div class="text-center mb-4">
            <img src="<?= asset('./images/cit.png') ?>" alt="Logo" class="img-fluid " width="120">
        </div>

        <!-- Campo para NIT -->
        <div class="row mb-3">
            <div class="col">
                <label for="usu_nit" class="form-label">NIT del Usuario</label>
                <input type="number" name="usu_nit" id="usu_nit" class="form-control" placeholder="Ingresa tu NIT" required>
            </div>
        </div>

        <!-- Campo para contraseña -->
        <div class="row mb-3">
            <div class="col">
                <label for="usu_password" class="form-label">Contraseña</label>
                <input type="password" name="usu_password" id="usu_password" class="form-control" placeholder="Ingresa tu contraseña" required>
            </div>
        </div>

        <!-- Botón de iniciar sesión -->
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-primary w-100 btn-lg">
                    Iniciar sesión
                </button>
            </div>
        </div>

        <!-- Separador y mensaje para el registro -->
        <div class="text-center mb-3">
            <span>¿No tienes una cuenta?</span>
        </div>

        <!-- Botón de registro -->
        <div class="row">
            <div class="col">
                <a href="/register" class="btn btn-success w-100 btn-lg">
                    Registrarse
                </a>
            </div>
        </div>
    </form>
</div>



<!-- Carga el archivo JS para la lógica de autenticación -->
<script src="<?= asset('/build/js/login/index.js') ?>"></script>

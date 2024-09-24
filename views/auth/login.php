<style>
    .portal {
        font-family: "Chau Philomene One", sans-serif;
        text-align: center;
        color: black;
        font-size: 5rem;
        margin-bottom: 20px; /* Reducir margen inferior del título */
    }

    .content {
        background-image: url('images/fondo.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }
</style>

<div class="row content justify-content-center">
    <h1 class="portal text-center">Bienvenido a Portal del Lago</h1>
    <div class="row justify-content-center">
        <form class="col-lg-3 border border-secondary rounded shadow p-4 bg-secondary bg-gradient text-white">
            <div class="text-center mb-4">
                <img src="<?= asset('./images/fondohotel.webp') ?>" alt="Logo" class="img-fluid rounded-circle shadow" width="120">
            </div>
    
            <div class="row mb-3">
                <div class="col">
                    <label for="usu_nit" class="form-label">NIT del Usuario</label>
                    <input type="number" name="usu_nit" id="usu_nit" class="form-control" placeholder="Ingresa tu NIT" required>
                </div>
            </div>
    
            <div class="row mb-3">
                <div class="col">
                    <label for="usu_password" class="form-label">Password</label>
                    <input type="password" name="usu_password" id="usu_password" class="form-control" placeholder="Ingresa tu contraseña" required>
                </div>
            </div>
    
            <div class="row justify-content-center mb-3">
                <div class="col-lg-5">
                    <button type="submit" class="btn btn-primary w-100 btn-lg">
                        Iniciar sesión
                    </button>
                </div>
            </div>
    
            <div class="text-center mb-3">
                <span>¿No tienes una cuenta? consulta con el administrador de Hotel el portal del lago</span>
            </div>    
        </form>
    </div>
</div>

<script src="<?= asset('/build/js/login/index.js') ?>"></script>

<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="<?= asset('images/cit.png') ?>" alt="Logotipo" style="max-width: 40px; height: auto;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="#">Examen Final</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="reportesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Reservaciones
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="reportesDropdown">
                        <li><a class="dropdown-item" href="/hotel/reservaciones">Buscar Reservaciones</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="reportesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Reporte de Gráficas
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="reportesDropdown">
                        <li><a class="dropdown-item" href="/hotel/grafica">Reporte de cantidad de Habitaciones Disponibles, Ocupadas y Limpieza</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<br><br><br>
<h1 class="text-center">Reservar una Habitación</h1>

<div class="row justify-content-center mb-5">
    <!-- Formulario de reservación -->
    <form class="col-lg-8 border bg-light p-3" id="form-reservacion">
    <input type="hidden" name="reser_id" id="reser_id"> <!-- Este campo debe tener el mismo nombre que en el controlador -->
        <div class="row mb-3">
            <div class="col">
                <label for="habi_id">Detalles de la Habitación:</label>
                <select name="habi_id" id="habi_id" class="form-control">
                    <?php foreach ($habitaciones as $habitacion): ?>
                        <option value="<?php echo htmlspecialchars($habitacion['habi_id']); ?>">
                            <?php echo htmlspecialchars($habitacion['habi_tipo']); ?> - $<?php echo htmlspecialchars($habitacion['habi_precio']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="clie_id">ID del Cliente:</label>
                <input type="text" id="clie_id" name="clie_id" value="<?php echo htmlspecialchars($cliente); ?>" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="reser_fecha_entrada">Fecha de Entrada:</label>
                <input  id="reser_fecha_entrada" type="datetime-local"  name="reser_fecha_entrada" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="reser_fecha_salida">Fecha de Salida:</label>
                <input type="datetime-local" id="reser_fecha_salida"  name="reser_fecha_salida" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" id="btnGuardar" class="btn btn-primary w-100">Guardar Reservacion</button>
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

<!-- Mensaje de éxito/error -->
<div id="mensaje"></div>





<div class="row justify-content-center mt-5">
    <div class="col table-responsive col-lg-11 table-wrapper border shadow bg-light rounded">
        <table class="table table-bordered table-hover w-100 text-center shadow" id="tabla-reservaciones"></table>
    </div>
</div>

<!-- Tabla de reservaciones -->

<script src="<?= asset('/build/js/reservaciones/index.js') ?>"></script>
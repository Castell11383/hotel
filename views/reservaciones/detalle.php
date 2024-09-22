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
        <div class="row mb-3">
            <div class="col">
                <label for="habi_id">Seleccionar Habitación:</label>
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
            </div
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" id="btnGuardar" class="btn btn-primary w-100">Guardar Reservacion</button>
            </div>
        </div>
    </form>
</div>

<!-- Mensaje de éxito/error -->
<div id="mensaje"></div>

<!-- Tabla de reservaciones -->
<h1 class="text-center">Reservaciones Guardadas</h1>
<div class="row justify-content-center">
    <div class="col table-responsive" style="max-width: 80%; padding: 10px;">
        <table id="tabla-reservaciones" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID Reservación</th>
                    <th>ID Cliente</th>
                    <th>ID Habitación</th>
                    <th>Fecha Entrada</th>
                    <th>Fecha Salida</th>
                    <th>Situación</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservaciones as $reservacion): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($reservacion->reser_id); ?></td>
                        <td><?php echo htmlspecialchars($reservacion->reser_cliente); ?></td>
                        <td><?php echo htmlspecialchars($reservacion->reser_habitacion); ?></td>
                        <td><?php echo htmlspecialchars($reservacion->reser_fecha_entrada); ?></td>
                        <td><?php echo htmlspecialchars($reservacion->reser_fecha_salida); ?></td>
                        <td><?php echo $reservacion->reser_situacion == 1 ? 'Activa' : 'Cancelada'; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="<?= asset('/build/js/reservaciones/index.js') ?>"></script>
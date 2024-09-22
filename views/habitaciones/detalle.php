<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Mostrar detalles de la habitación solo si no se ha enviado el formulario
if (!isset($_POST['clie_id'])): ?>

    <h1>Detalles de la Habitación: <?php echo $habitacion->habi_tipo; ?></h1>
    <img src="<?php echo $habitacion->habi_imagen; ?>" alt="<?php echo $habitacion->habi_tipo; ?>">
    <p><?php echo $habitacion->habi_descripcion; ?></p>
    <p>Precio: $<?php echo $habitacion->habi_precio; ?></p>

    <!-- Formulario de Reservación -->
    <form id="reserva-form" action="/confirmar-reservacion" method="POST">
        <input type="hidden" name="habi_id" value="<?php echo $habitacion->habi_id; ?>">

        <label for="clie_id">ID del Cliente</label>
        <input type="text" id="clie_id" name="clie_id" required>

        <label for="reser_fecha_entrada">Fecha de Entrada</label>
        <input type="date" id="reser_fecha_entrada" name="reser_fecha_entrada" required>

        <label for="reser_fecha_salida">Fecha de Salida</label>
        <input type="date" id="reser_fecha_salida" name="reser_fecha_salida" required>

        <button type="submit">Confirmar Reservación</button>
    </form>

<?php else: ?>

    <!-- Mostrar el formulario con los datos llenos automáticamente de la reservación -->
    <h1>Formulario de Reservación Confirmada</h1>

    <form id="guardar-reserva-form" action="/guardar-reservacion" method="POST">
        <input type="hidden" name="habi_id" value="<?php echo $_POST['habi_id']; ?>">
        <input type="hidden" name="clie_id" value="<?php echo $_POST['clie_id']; ?>">
        
        <label for="reser_fecha_entrada">Fecha de Entrada</label>
        <input type="date" id="reser_fecha_entrada" name="reser_fecha_entrada" value="<?php echo $_POST['reser_fecha_entrada']; ?>" required>

        <label for="reser_fecha_salida">Fecha de Salida</label>
        <input type="date" id="reser_fecha_salida" name="reser_fecha_salida" value="<?php echo $_POST['reser_fecha_salida']; ?>" required>

        <button type="submit">Guardar Reservación</button>
    </form>

<?php endif; ?>
<script src="<?= asset('./build/js/habitaciones/index.js')  ?>"></script>
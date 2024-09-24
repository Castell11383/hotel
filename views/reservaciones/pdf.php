
<div class="container">
        <h1 class=" my-4" style="color: #333; text-align:center;">Historial de Reservaciones</h1>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" style="width: 100%; margin: 0 auto; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
   s             <thead>
                    <tr>
                        <th style="background-color: #007bff; color: white; text-align: center; width: 5%;">No.</th>
                        <th style="background-color: #007bff; color: white; text-align: center; width: 15%;">Cliente</th>
                        <th style="background-color: #007bff; color: white; text-align: center; width: 10%;">Teléfono</th>
                        <th style="background-color: #007bff; color: white; text-align: center; width: 20%;">Correo</th>
                        <th style="background-color: #007bff; color: white; text-align: center; width: 10%;">Entrada</th>
                        <th style="background-color: #007bff; color: white; text-align: center; width: 10%;">Salida</th>
                        <th style="background-color: #007bff; color: white; text-align: center; width: 20%;">Detalles</th>
                        <th style="background-color: #007bff; color: white; text-align: center; width: 10%;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservaciones as $key => $reservacion): ?>
                    <tr>
                        <td style="padding: 12px; background-color: #f9f9f9; text-align: center;"><?= $key + 1 ?></td>
                        <td style="padding: 12px; background-color: #f9f9f9; text-align: left;"><?php echo htmlspecialchars($reservacion['nombre_cliente']); ?></td>
                        <td style="padding: 12px; background-color: #f9f9f9; text-align: left;"><?php echo htmlspecialchars($reservacion['telefono']); ?></td>
                        <td style="padding: 12px; background-color: #f9f9f9; text-align: left;"><?php echo htmlspecialchars($reservacion['correo']); ?></td>
                        <td style="padding: 12px; background-color: #f9f9f9; text-align: center;"><?php echo htmlspecialchars($reservacion['entrada']); ?></td>
                        <td style="padding: 12px; background-color: #f9f9f9; text-align: center;"><?php echo htmlspecialchars($reservacion['salida']); ?></td>
                        <td style="padding: 12px; background-color: #f9f9f9; text-align: justify;"><?php echo htmlspecialchars($reservacion['detalles_habitacion']); ?></td>
                        <td style="padding: 12px; background-color: #f9f9f9; text-align: center;"><?php echo htmlspecialchars($reservacion['total']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Aquí puedes insertar la gráfica si está disponible como imagen o alguna otra representación -->


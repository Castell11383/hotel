<div class="container mt-2">
    <h1 style=" color: blue; font-family:fantasy;" class="text-center">Historial de Reservaciones</h1>
    <div class="row justify-content-center">
        <div class="col-lg-11 table-responsive">
            <div class="text-center">
            </div>
            <table class="table table-bordered table-hover table-sm" style="border-color: #a1e3a1;">
                <thead style="background-color: #a1e3a1; color: #fff;">
                    <tr class="text-center">
                       
                    </tr>
                    <tr class="text-center">
                        <th style="background-color: #87d3c4;">NO.</th>
                        <th style="background-color: #87d3c4;">Cliente</th>       
                        <th style="background-color: #87d3c4;">Teléfono</th>
                        <th style="background-color: #87d3c4;">Correo</th>
                        <th style="background-color: #87d3c4;">Entrada</th>
                        <th style="background-color: #87d3c4;">Salida</th>
                        <th style="background-color: #87d3c4;">Detalles</th>
                        <th style="background-color: #87d3c4;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($reservaciones) > 0) { ?>
                        <?php foreach ($reservaciones as $key => $opciones) : ?>
                            <tr class="text-center" style="background-color: #e6f9f3;">
                                <td><?= $key + 1 ?></td>
                                <td><?= htmlspecialchars($opciones['nombre_cliente']) ?></td>
                                <td><?= htmlspecialchars($opciones['telefono']) ?></td>
                                <td><?= htmlspecialchars($opciones['correo']) ?></td>
                                <td><?= htmlspecialchars($opciones['entrada']) ?></td>
                                <td><?= htmlspecialchars($opciones['salida']) ?></td>
                                <td><?= htmlspecialchars($opciones['detalles_habitacion']) ?></td>
                                <td>$<?= htmlspecialchars($opciones['total']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php } else { ?>
                        <tr class="text-center" style="background-color: #f4f4f4;">
                            <td colspan="8" class="text-center">Sin reservaciones</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="<?= asset('./build/js/detalle/index.js') ?>"></script>
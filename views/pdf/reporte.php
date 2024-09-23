<div class="container">
    <div class="logo">
        <img src="<?= __DIR__ . '/../../public/images/faclogo.jpg' ?>" alt="Logo del Hotel"
            style="width: 150px; height: 150;">
        <hr>
    </div>

    <div class="row">
        <div class="col">
            <div class="header-details-fecha">
                <h1>Fecha:</h1>
                <p><?= date('d-m-Y') ?></p>
            </div>
        </div>
        <div class="col">
            <div class="header-details-numero">
                <h1>No. Factura:</h1>
                <p>#12345</p>
            </div>
        </div>
    </div>

    <table class="simple-table">
        <thead>
            <tr>
                <th>NO.</th>
                <th>Empleado</th>
                <th>Cliente</th>
                <th>NIT</th>
                <th>Habitación</th>
                <th>Precio</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $key => $producto): ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $producto['deta_empleado'] ?></td>
                    <td><?= $producto['deta_reservacion'] ?></td>
                    <td><?= $producto['nit_cliente'] ?></td>
                    <td><?= $producto['tipo_habitacion'] ?></td>
                    <td>Q. <?= $producto['deta_total'] ?></td>
                    <td><?= $producto['descripcion_habitacion'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <div class="footer">
        <p>Gracias por su preferencia. Si tiene alguna pregunta sobre esta factura, contáctenos al <strong>(502) 1234-5678</strong></p>
        <p class="highlight">¡Esperamos verlo pronto!</p>
    </div>
</div>
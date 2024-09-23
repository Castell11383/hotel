<div class="container">
    <div class="logo">
    <img class="logo1" src="<?= __DIR__ . '/../../public/images/faclogo.jpg' ?>" alt="Logo del Hotel" style="width: 150px; height: 150;">


    </div>
    <h1>Reporte de Factura de Reservación</h1>
    <p>Portal del Lago</p>

    <div class="header-details">
        <p>Fecha: <?= date('d-m-Y') ?></p>
        <p>Factura No: #12345</p>
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

    <pagebreak resetpagenum="1" pagenumstyle="a" suppress="off" />
</div>
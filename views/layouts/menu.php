<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="build/js/app.js"></script>
    <title>Hotel Portal del Lago</title>
    <link rel="shortcut icon" href="<?= asset('images/cit.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= asset('build/styles.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chau+Philomene+One:ital@0;1&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+DE+Grund:wght@100..400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+DE+Grund:wght@100..400&family=Sofadi+One&display=swap" rel="stylesheet">
    <style>
        @keyframes cambioFondo {
            0% {
                background-color: #D0E9F4;
            }

            25% {
                background-color: #E1F5A2;
            }

            50% {
                background-color: #A2DFF7;
            }

            75% {
                background-color: #F4E1A2;
            }

            100% {
                background-color: #F4C3C3;
            }
        }

        body {
            margin: 0;
            display: flex;
            flex-direction: column;
            /* Para mantener el navbar y el contenido en columna */
            animation: cambioFondo 10s infinite;
            /* Cambia cada 10 segundos */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="/hotel/inicio">
                <img src="<?= asset('./images/cit.png') ?>" width="35px'" class="rounded-circle">
                Aplicaciones
            </a>
            <div class="collapse navbar-collapse" id="navbarToggler">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin: 0;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/hotel/inicio"><i class="bi bi-house-fill me-2"></i>Inicio</a>
                    </li>

                    <div class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-people-fill"></i> Empleados
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-dark " id="dropwdownRevision" style="margin: 0;">
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/hotel/empleados"><i class="bi bi-person-fill-add"></i> Registrar</a>
                            </li>

                        </ul>
                    </div>

                    <div class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-house-add-fill"></i> Reservaciones
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-dark " id="dropwdownRevision" style="margin: 0;">
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/hotel/reservaciones/detalle"><i class="bi bi-house-lock-fill"></i> Reservacion</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/hotel/detalle"><i class="bi bi-clock-history"></i> Historial</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/hotel/factura"><i class="bi bi-file-earmark-text-fill"></i> Factura</a>
                            </li>
                        </ul>
                    </div>

                    <div class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-person-lines-fill"></i> Clientes
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-dark " id="dropwdownRevision" style="margin: 0;">
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/hotel/cliente"><i class="bi bi-person-plus-fill"></i> Registrar</a>
                            </li>
                        </ul>
                    </div>

                    <div class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-houses-fill"></i> Habitaciones
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-dark " id="dropwdownRevision" style="margin: 0;">
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/hotel/habitaciones"><i class="bi bi-house-gear-fill"></i> Tipos</a>
                            </li>
                        </ul>
                    </div>
                </ul>
                <div class="col-lg-1 d-grid mb-lg-0 mb-2">

                    <a href="/hotel/logout" class="btn btn-danger"><i class="bi bi-arrow-bar-left">salir</i></a>
                </div>

            </div>
        </div>

    </nav>
    <div class="progress fixed-bottom" style="height: 6px;">
        <div class="progress-bar progress-bar-animated bg-danger" id="bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="container-fluid mb-4" style="min-height: 85vh">

        <?php echo $contenido; ?>
    </div>
    <div class="container-fluid bg-dark bg-gradient text-white">
        <div class="row justify-content-center text-center">
            <div class="col-12">
                <p style="font-size:xx-small; font-weight: bold;">
                    Comando de Informática y Tecnología, <?= date('Y') ?> &copy;
                </p>
            </div>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="build/js/app.js"></script>
    <link rel="shortcut icon" href="<?= asset('images/cit.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= asset('build/styles.css') ?>">
    <title>DemoApp</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .hero {
            background-image: url('images/banner.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.6);
        }

        .hero-text {
            z-index: 1;
            text-align: center;
        }

        .hero-text h1 {
            font-size: 3rem;
            margin: 0;
            color: #fff;
        }

        .hero-text p {
            font-size: 1.5rem;
            margin: 1rem 0;
            color: #fff;
        }

        .features {
            padding: 3rem 0;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .feature {
            margin-bottom: 2rem;
        }

        .feature img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 1rem;
        }

        .feature h3 {
            font-size: 1.75rem;
            margin-bottom: 1rem;
        }

        .feature p {
            font-size: 1rem;
            color: #555;
            margin: 0 auto;
            max-width: 300px;
        }

        /* Sección de Promociones Exclusivas */
        /* Efecto hover en las imágenes de promociones */
        /* Efecto hover en las tarjetas de promociones */
        .curso {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .curso:hover {
            transform: scale(1.03);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .curso__imagen img {
            transition: transform 0.3s ease;
        }

        .curso:hover .curso__imagen img {
            transform: scale(1.1);
        }

        .curso__imagen img {
            width: 100%;
            max-width: 400px;
            /* Aumenta el tamaño máximo de la imagen */
            height: auto;
            /* Mantiene la proporción */
            border-radius: 10px 0 0 10px;
        }


        .contenedor {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .centrar-texto {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 2rem;
        }

        .curso {
            display: flex;
            background-color: #f9f9f9;
            margin-bottom: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }



        .curso__informacion {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .curso__informacion h4 {
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .curso__label {
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .curso__info {
            color: #007bff;
        }

        .curso__descripcion {
            margin-top: 1rem;
            color: #555;
        }

        /* Opiniones en Tarjetas */
        .testimonials {
            padding: 3rem 0;
            background-color: #f0f0f0;
            text-align: center;
        }

        .testimonials h2 {
            font-size: 2rem;
            margin-bottom: 2rem;
        }

        .testimonial {
            background-color: #fff;
            display: inline-block;
            padding: 2rem;
            margin: 1rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 350px;
        }

        .testimonial img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 1rem;
        }

        .testimonial p {
            font-style: italic;
            color: #555;
        }

        .testimonial h4 {
            margin-top: 1rem;
            font-size: 1.2rem;
            color: #007bff;
        }

        /* Galería de Imágenes */
        .gallery {
            padding: 3rem 0;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .gallery h2 {
            font-size: 2rem;
            margin-bottom: 2rem;
        }

        .gallery-grid {
            display: flex;
            justify-content: center;
            /* Centra el contenido */
            gap: 1rem;
        }

        .gallery-grid img {
            width: 300px;
            /* Fija el ancho */
            height: 200px;
            /* Fija la altura para mantener el mismo tamaño */
            border-radius: 10px;
            object-fit: cover;
        }


        /* Sección de Contacto */
        .contact-section {
            background-color: #f8f9fa;
            padding: 3rem 0;
            text-align: center;
        }

        .contact-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            max-width: 1200px;
            margin: 0 auto;
        }

        .contact-info,
        .contact-form {
            width: 48%;
            padding: 1rem;
            box-sizing: border-box;
        }

        .contact-info h4,
        .contact-form h4 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .contact-info p {
            font-size: 1rem;
            line-height: 1.5;
            color: #333;
        }

        .contact-form input {
            width: calc(100% - 2rem);
            padding: 0.5rem;
            margin: 0.5rem 0;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
            font-size: 1rem;
        }

        .contact-form button {
            padding: 0.75rem 1.5rem;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 0.25rem;
            font-size: 1rem;
            cursor: pointer;
        }

        .contact-form button:hover {
            background-color: #0056b3;
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .contact-container {
                flex-direction: column;
                align-items: center;
            }

            .contact-info,
            .contact-form {
                width: 100%;
                margin-bottom: 1.5rem;
            }

            .curso {
                flex-direction: column;
            }

            .gallery-grid {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
        
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="/ejemplo/">
                <img src="<?= asset('./images/cit.png') ?>" width="35px'" alt="cit" >
                Aplicaciones
            </a>
            <div class="collapse navbar-collapse" id="navbarToggler">
                
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin: 0;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/hotel/inicio"><i class="bi bi-house-fill me-2"></i>Inicio</a>
                    </li>
  
                    <div class="nav-item dropdown " >
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-people-fill"></i> Empleados
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-dark "id="dropwdownRevision" style="margin: 0;">
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/hotel/empleados"><i class="bi bi-person-fill-add"></i> Registrar</a>
                            </li>
                                                  
                        </ul>
                    </div> 

                    <div class="nav-item dropdown " >
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-person-lines-fill"></i> Clientes
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-dark "id="dropwdownRevision" style="margin: 0;">
                            <li>
                                <a class="dropdown-item nav-link text-white " href="/hotel/cliente"><i class="bi bi-person-plus-fill"></i> Registrar</a>
                            </li>
                        </ul>
                    </div> 
                    
                </ul> 
                <div class="col-lg-1 d-grid mb-lg-0 mb-2">
                    <!-- Ruta relativa desde el archivo donde se incluye menu.php -->
                    <a href="/menu/" class="btn btn-danger"><i class="bi bi-arrow-bar-left"></i></a>
                </div>

            
            </div>
        </div>
        
    </nav>
    <div class="progress fixed-bottom" style="height: 6px;">
        <div class="progress-bar progress-bar-animated bg-danger" id="bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="container-fluid pt-5 mb-4" style="min-height: 85vh">
        
        <?php echo $contenido; ?>
    </div>
    <div class="container-fluid " >
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
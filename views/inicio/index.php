<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        overflow-x: hidden;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html,
    body {
        margin: 0;
        overflow-x: hidden;
    }

    .hero {
        background-image: url('images/banner.jpg');
        background-size: cover;
        background-position: center;
        height: 100vh;
        width: 100vw;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        color: #fff;
        margin: 0;
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
        font-family: "Lobster", sans-serif;
        text-align: center;
        color: #fff;
    }

    .hero-text h1 {
        font-size: 5rem;
        margin: 0;
        color: #fff;
        font-family: "Chau Philomene One", sans-serif;
    }

    .hero-text p {
        font-size: 1.5rem;
        margin: 1rem 0;
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
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        /* Transiciones suaves */
    }

    .feature:hover {
        transform: translateY(-10px);
        /* Mueve la tarjeta hacia arriba */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        /* Añade sombra al pasar el mouse */
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

    .contenedor {
        padding: 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .centrar-texto {
        text-align: center;
        font-size: 3rem;
        margin-bottom: 2rem;
        font-family: "Sofadi One", system-ui;
    }

    .curso {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        background-color: #fff;
        height: 400px;
        margin: 1rem;
        transition: transform 0.3s;
    }

    .curso:hover {
        transform: scale(1.05);
    }

    .curso__imagen img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .curso__informacion {
        padding: 1rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
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

    .testimonials {
        padding: 2rem 0;
        background-color: #f0f0f0;
        text-align: center;
    }

    .testimonials h2 {
        font-size: 3rem;
        margin-bottom: 2rem;
        font-family: "Sofadi One", system-ui;
    }

    .testimonial {
        background-color: #fff;
        display: inline-block;
        padding: 2rem;
        margin: 1rem;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 350px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .testimonial:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
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

    .gallery {
        padding: 3rem 0;
        max-width: 1200px;
        margin: 0 auto;
        text-align: center;
    }

    .gallery h2 {
        font-size: 3rem;
        margin-bottom: 2rem;
        font-family: "Sofadi One", system-ui;
    }

    .gallery-grid {
        display: flex;
        justify-content: center;
        gap: 1rem;
    }

    .gallery-grid img {
        width: 300px;
        height: 200px;
        border-radius: 10px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .gallery-grid img:hover {
        transform: scale(1.05);
    }

    .contact-section {
        background-color: #f8f9fa;
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
<section class="hero">
    <div class="overlay"></div>
    <div class="hero-text">
        <h1>Hotel Portal del Lago</h1>
        <img src="<?= asset('./images/logohotel.webp') ?>" width="200px'" class="rounded-circle">
        <p>El paraíso frente al lago en Guatemala</p>
    </div>
</section>

<section id="features" class="features">
    <div class="row">
        <div class="col-md-4 feature">
            <img src="images/blog1.jpg" alt="Habitaciones de lujo">
            <h3>Ubicación privilegiada</h3>
            <p>Descubre un refugio de paz a orillas del lago, donde el lujo se encuentra con la naturaleza.</p>
        </div>
        <div class="col-md-4 feature">
            <img src="images/blog2.jpg" alt="Restaurantes gourmet">
            <h3>Gastronomía única</h3>
            <p>Nuestro restaurante a la orilla del lago ofrece una fusión exquisita de la cocina guatemalteca.</p>
        </div>
        <div class="col-md-4 feature">
            <img src="images/blog3.jpeg" alt="Atención personalizada">
            <h3>Atención personalizada</h3>
            <p>En el Hotel Portal, nos enorgullecemos de ofrecer un servicio excepcional y cálido.</p>
        </div>
    </div>
</section>

<main class="contenedor">
    <h3 class="centrar-texto"><b>Promociones exclusivas</b></h3>
    <div class="row">
        <div class="col">
            <div class="curso">
                <div class="curso__imagen">
                    <img src="images/curso1.jpg" alt="Imagen del curso">
                </div>
                <div class="curso__informacion">
                    <h4 class="no-margin">Habitación Estándar con Vista al Lago</h4>
                    <p class="curso__label">Precio:
                        <span class="curso__info">$120 por noche</span>
                    </p>
                    <p class="curso__label">Capacidad:
                        <span class="curso__info">2 personas</span>
                    </p>
                    <p class="curso__descripcion">
                        Relájate en nuestra habitación estándar con vistas impresionantes al lago.
                    </p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="curso">
                <div class="curso__imagen">
                    <img src="images/curso2.jpg" alt="Imagen del curso">
                </div>
                <div class="curso__informacion">
                    <h4 class="no-margin">Habitación Familiar</h4>
                    <p class="curso__label">Precio:
                        <span class="curso__info">$180 por noche</span>
                    </p>
                    <p class="curso__label">Capacidad:
                        <span class="curso__info">4 personas</span>
                    </p>
                    <p class="curso__descripcion">
                        Ideal para familias, esta espaciosa habitación cuenta con dos camas dobles.
                    </p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="curso">
                <div class="curso__imagen">
                    <img src="images/curso3.jpg" alt="Imagen del curso">
                </div>
                <div class="curso__informacion">
                    <h4 class="no-margin">Suite Deluxe con Jacuzzi</h4>
                    <p class="curso__label">Precio:
                        <span class="curso__info">$250 por noche</span>
                    </p>
                    <p class="curso__label">Capacidad:
                        <span class="curso__info">2 personas</span>
                    </p>
                    <p class="curso__descripcion">
                        Disfruta de una experiencia de lujo en nuestra Suite Deluxe.
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
</section>

<section class="testimonials rounded">
    <h2><b>Lo que dicen nuestros clientes</b></h2>
    <div class="testimonial">
        <p>"La mejor experiencia de mi vida. ¡Vistas impresionantes y un servicio inmejorable!"</p>
        <img src="images/jean.jpg" alt="Cliente feliz">
        <h4>- Jean Paul Vargas</h4>
    </div>
    <div class="testimonial">
        <p>"Un lugar espectacular para desconectarse y disfrutar de la naturaleza."</p>
        <img src="images/castellanos.jpg" alt="Cliente satisfecho">
        <h4>- Ronald Enmanuel Castellanos</h4>
    </div>
    <div class="testimonial">
        <p>"Las habitaciones son cómodas y el personal es muy amable. ¡Volveré sin duda!"</p>
        <img src="images/cuxum.jpg" alt="Cliente satisfecho">
        <h4>- Nixon Cuxum</h4>
    </div>
    <div class="testimonial">
        <p>"Las vistas son impresionantes y el servicio es excelente. Altamente recomendable."</p>
        <img src="images/jennifer.jpg" alt="Cliente satisfecho">
        <h4>- Jennifer Jimenez</h4>
    </div>
</section>

<section class="gallery">
    <h2><b>Nuestras Instalaciones</b></h2>
    <div class="gallery-grid">
        <img src="images/nosotros.jpg" alt="Imagen del hotel">
        <img src="images/piscina.jpg" alt="Piscina">
        <img src="images/restaurante.jpg" alt="Restaurante">
        <img src="images/fondo.jpeg" alt="paisaje">
        <img src="images/portal.jpg" alt="portal">
    </div>
</section>
<?php
echo "<pre>";
var_dump($_SESSION);
var_dump($_SESSION['user']['rol_nombre_ct']);
echo "</pre>";

?>

<section class="contact-section rounded">
    <div class="contact-container justify-content-center row">
        <div class="contact-info col-lg-2">
            <h2><b>Contáctanos</b></h2>
            <h4><b>Nuestra Ubicación</b></h4>
            <p>
                Lago de Atitlán, Sololá, Guatemala<br>
                Tel: +502 1234 5678<br>
                Correo: hotelportaldellago@gmail.com
            </p>
        </div>
        <div class="row">
            <div class="contact-form justify-content-center col-lg">
                <div class="row justify-content-center">
                    <div class="col-lg-15 border border-dark rounded shadow" id="map" style="height: 60vh; width: 250vh; min-height: auto;">
    
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 mb-5">
            <div class="col">
                <a href="https://www.facebook.com" target="_blank">
                    <i class="bi bi-facebook bg-primary bg-gradient text-white p-2 rounded-circle" style="font-size: 3rem; width: 5rem; height: 5rem; display: inline-flex; justify-content: center; align-items: center;"></i>
                </a>
            </div>
            <div class="col">
                <a href="https://wa.me/1234567890" target="_blank">
                    <i class="bi bi-whatsapp bg-success bg-gradient text-white p-2 rounded-circle" style="font-size: 3rem; width: 5rem; height: 5rem; display: inline-flex; justify-content: center; align-items: center;"></i>
                </a>
            </div>
            <div class="col">
                <a href="https://www.instagram.com" target="_blank">
                    <i class="bi bi-instagram text-white p-2 rounded-circle" style="background-color: fuchsia; font-size: 3rem; width: 5rem; height: 5rem; display: inline-flex; justify-content: center; align-items: center;"></i>
                </a>
            </div>
            <div class="col">
                <a href="https://twitter.com" target="_blank">
                    <i class="bi bi-twitter bg-info bg-gradient text-white p-2 rounded-circle" style="font-size: 3rem; width: 5rem; height: 5rem; display: inline-flex; justify-content: center; align-items: center;"></i>
                </a>
            </div>
            <div class="col">
                <a href="https://www.youtube.com" target="_blank">
                    <i class="bi bi-youtube bg-danger bg-gradient text-white p-2 rounded-circle" style="font-size: 3rem; width: 5rem; height: 5rem; display: inline-flex; justify-content: center; align-items: center;"></i>
                </a>
            </div>
        </div>
    </div>
    </div>
</section>

<script src="<?= asset('./build/js/inicio/index.js') ?>"></script>
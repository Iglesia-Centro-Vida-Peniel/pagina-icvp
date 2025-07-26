<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Centro Vida Peniel</title>
    <!-- Favicon -->
    <link rel="icon" type="" href="">
    <!-- Fuentes de Google -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Lato:wght@400;700&family=Cinzel:wght@700&display=swap" rel="stylesheet">
    <!-- AOS Library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Enlace al CSS -->
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <!-- Carrusel de fondo -->
    <div class="background-carousel">
        <div class="carousel-slide">
            <img src="imgs/carousel/IMG-20250323-WA0004.jpg" alt="Foto 1" loading="lazy">
            <img src="imgs/carousel/IMG-20250323-WA0005.jpg" alt="Foto 2" loading="lazy">
            <img src="imgs/carousel/IMG-20250323-WA0006.jpg" alt="Foto 3" loading="lazy">
            <img src="imgs/carousel/IMG-20250323-WA0007.jpg" alt="Foto 4" loading="lazy">
            <img src="imgs/carousel/IMG-20250323-WA0008.jpg" alt="Foto 5" loading="lazy">   
            <img src="imgs/carousel/IMG-20250323-WA0009.jpg" alt="Foto 6" loading="lazy">
            <img src="imgs/carousel/IMG-20250323-WA0010.jpg" alt="Foto 7" loading="lazy">
            <img src="imgs/carousel/IMG-20250323-WA0011.jpg" alt="Foto 8" loading="lazy">
            <img src="imgs/carousel/IMG-20250323-WA0013.jpg" alt="Foto 9" loading="lazy">
            <img src="imgs/carousel/IMG-20250323-WA0014.jpg" alt="Foto 10" loading="lazy">
            <img src="imgs/carousel/IMG-20250323-WA0016.jpg" alt="Foto 10" loading="lazy">
        </div>
    </div>

    <!-- Barra de navegación -->
    <nav class="navbar">
        <div class="navbar-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="navbar-menu">
            <li><a href="index.html">Inicio</a></li>
            <li><a href="nosotros.html">Nosotros</a></li>
            <li><a href="eventos.html">Eventos</a></li>
            <li><a href="contacto.php">Contacto</a></li>
            <li><a href="donaciones.html">Donaciones</a></li>
            <li><a href="misiones.html">Misiones</a></li>
        </ul>
    </nav>

    <!-- Sección del título principal -->
    <section class="hero-section" id="inicio">
        <div class="text-background">
            <h1 class="title">CONTACTO</h1>
        </div>
    </section>

    <!-- Sección de Contacto -->
    <section class="contact-section">
        <div class="contact-container">
            <h2>Contáctanos</h2>
            <p>¿Tienes alguna pregunta o deseas ponerte en contacto con nosotros? ¡Déjanos un mensaje!</p>
            <div class="contact-form">
                <form method="POST" action="contacto.php">
                    <input type="text" name="nombre" placeholder="Nombre" required>
                    <input type="email" name="email" placeholder="Correo Electrónico" required>
                    <textarea name="mensaje" placeholder="Mensaje" rows="5" required></textarea>
                    <button type="submit" name="submit">Enviar Mensaje</button>
                </form>
                <?php
                    if (isset($_POST['submit'])) {
                        $nombre = $_POST['nombre'];
                        $email = $_POST['email'];
                        $mensaje = $_POST['mensaje'];

                        // Configuración de la conexión a la base de datos
                        $servername = "localhost";
                        $username = "root";
                        $password = "ola";
                        $dbname = "centro_vida_peniel";

                        // Crear conexión
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Verificar conexión
                        if ($conn->connect_error) {
                            die("Conexión fallida: " . $conn->connect_error);
                        }

                        // Preparar y vincular
                        $stmt = $conn->prepare("INSERT INTO contactos (nombre, email, mensaje, fecha) VALUES (?, ?, ?, NOW())");
                        $stmt->bind_param("sss", $nombre, $email, $mensaje);

                        // Ejecutar la consulta
                        if ($stmt->execute()) {
                            echo "<p style='color: green; text-align: center;'>Mensaje enviado con éxito.</p>";
                        } else {
                            echo "<p style='color: red; text-align: center;'>Error al enviar el mensaje.</p>";
                        }

                        // Cerrar conexión
                        $stmt->close();
                        $conn->close();
                    }
                ?>
            </div>
        </div>

        <!-- Información de Contacto -->
        <div class="contact-info">
            <h2>Información de Contacto</h2>
            <div class="info-container">
                <div class="info-item">
                    <h3>Dirección</h3>
                    <p>CENTRO VIDA PENIEL, 20.1066895, -98.3525408, México</p>
                </div>
                <div class="info-item">
                    <h3>Teléfono</h3>
                    <p>+52 7753498524</p>
                </div>
                <div class="info-item">
                    <h3>Email</h3>
                    <p>icvpeniel@gmail.com</p>
                </div>
            </div>
        </div>

        <!-- Mapa -->
        <div class="map-section">
            <h2>Encuéntranos</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.086507563773!2d-98.3538175!3d20.1066719!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d057002f790c7d:0xc86fb217e0be2813!2zQ0VOVFJPIFZJREFgUEVOSUVM!5e0!3m2!1ses!2smx!4v1718299200000" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>

    <!-- Botón para Subir -->
    <button class="scroll-top" aria-label="Volver arriba">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2">
            <path d="M12 19V5M5 12l7-7 7 7"/>
        </svg>
    </button>

    <!-- Footer -->
    <footer class="footer" id="contacto">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Centro Vida Peniel</h3>
                <p>CENTRO VIDA PENIEL, 20.1066895, -98.3525408, México</p>
                <p>Email: icvpeniel@gmail.com</p>
                <p>Teléfono: +52 7753498524</p>
            </div>
            <div class="footer-section">
                <h3>Enlaces Rápidos</h3>
                <p>
                    <a href="index.html">Inicio</a> | 
                    <a href="nosotros.html">Nosotros</a> | 
                    <a href="eventos.html">Eventos</a> | 
                    <a href="contacto.php">Contacto</a> | 
                    <a href="donaciones.html">Donaciones</a> | 
                    <a href="misiones.html">Misiones</a>
                </p>
            </div>
            <div class="footer-section">
                <h3>Síguenos</h3>
                <p>
                    <a href="https://www.facebook.com/profile.php?id=100065034662616">Facebook</a> | 
                    <a href="#">Instagram</a> | 
                    <a href="https://www.youtube.com/@centrovidaprogresoiglesia452">YouTube</a>
                </p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 Centro Vida Peniel. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        // Inicializar AOS
        AOS.init({ once: true, duration: 800 });

        // Carrusel de fondo
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-slide img');
        const totalSlides = slides.length;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.style.opacity = i === index ? '1' : '0';
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            showSlide(currentSlide);
        }

        showSlide(currentSlide);
        setInterval(nextSlide, 5000);

        // Control del menú hamburguesa
        const navbarToggle = document.querySelector('.navbar-toggle');
        const navbarMenu = document.querySelector('.navbar-menu');

        navbarToggle.addEventListener('click', () => {
            navbarMenu.classList.toggle('active');
            navbarToggle.classList.toggle('active');
        });

        // Botón para subir
        const scrollTopButton = document.querySelector('.scroll-top');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                scrollTopButton.style.opacity = '1';
                scrollTopButton.style.pointerEvents = 'auto';
            } else {
                scrollTopButton.style.opacity = '0';
                scrollTopButton.style.pointerEvents = 'none';
            }
        });

        scrollTopButton.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>
</html>
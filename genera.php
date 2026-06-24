<?php
// wordpress

if (function_exists('get_template_directory_uri')) {
    // Estamos en WordPress
    if (!defined('ABSPATH')) {
        exit; // Exit if accessed directly
    }
}
/*
  Template Name: Genera
  Description: Plantilla personalizada para el portal Genera
*/

// Detectar si el entorno es local (localhost, 127.0.0.1 o ::1)
$is_local = in_array($_SERVER['SERVER_NAME'], ['localhost', '127.0.0.1', '::1']);

// Forzar idioma inglés en entorno local
$lang = $is_local ? 'en' : (function_exists('Lang\\getLang') ? Lang\getLang() : 'en');

// Detectar entorno para cargar cabecera
if (function_exists('get_template_directory_uri')) {
    $basePath = get_template_directory_uri() . '/assets/genera/';
    get_header();
} else {
    $basePath = './';
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Genera</title>
    </head>
    <body>
    <?php
}
?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Gabarito:wght@400;500;600;700;800;900&display=swap');

/* Reset and CSS Variables */
:root {
  --darkblue: #253d93;
  --primary-navy: #0c2340;
  --governance-purple: #5c2578;
  --accent-orange: #ec882c;
  --accent-pink: #d6006c;
  --accent-blue: #1ba6d2;
  --bg-light: #f8f9fa;
  --text-dark: #1f2937;
  --text-muted: #6b7280;
  --text-light: #ffffff;
  --font-family: 'Gabarito', sans-serif;
  --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
body {
    margin: 0;
    padding: 0;
}
.genera-container {
  font-family: var(--font-family);
  color: var(--text-dark);
  background-color: var(--text-light);
  line-height: 1.6;
  width: 100%;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.genera-container * {
  box-sizing: border-box;
}

/* SECTION 1: HERO BANNER */
.genera-hero {
  position: relative;
  width: 100%;
  height: 98vh;
  background-image: url('<?php echo $basePath; ?>header-genera.png');
  background-size: cover;
  background-position: center;
  background-attachment: scroll;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  overflow: hidden;
}

.genera-hero-content {
  position: relative;
  z-index: 10;
  color: var(--text-light);
  padding: 0 20px;
  max-width: 900px;
  animation: fadeInUp 1.2s ease-out;
}

/* Logo Design */
.genera-hero-logo {
  margin-bottom: 25px;
}

.genera-logo-img {
  width: 26rem;
  max-width: 90vw;
  height: auto;
}

.genera-hero-tagline {
  font-size: 24px;
  font-weight: 400;
  max-width: 700px;
  margin: 0 auto;
  text-shadow: 0 2px 5px rgba(0, 0, 0, 0.35);
  letter-spacing: 0.01em;
}

/* Micro-animations */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Responsiveness */
@media (max-width: 768px) {
  .genera-hero-logo {
    margin-bottom: 10px;
  }
  .genera-hero {
    height: 80vh;
    min-height: 400px;
  }
  .genera-logo-img {
    width: 18rem;
    max-width: 85vw;
  }
  .genera-hero-tagline {
    font-size: 18px !important;
    line-height: 1.4;
    padding: 0 10px;
  }
}

/* SECTION 2: FUNDACIÓN & GOBERNANZA */
.genera-fundacion {
  padding: 100px 0;
  background-color: var(--bg-light);
  position: relative;
}

.genera-fundacion-grid {
  display: grid;
  grid-template-columns: 1.10fr 0.90fr;
  gap: 80px;
  align-items: center;
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 30px;
}

.genera-fundacion-info {
  display: flex;
  flex-direction: column;
}

.genera-fundacion-title {
  font-size: 3.2rem;
  font-weight: 800;
  color: var(--darkblue);
  line-height: 1.15;
  margin: 0 0 25px 0;
  letter-spacing: -0.02em;
}

.genera-fundacion-text {
  font-size: 1.1rem;
  color: var(--darkblue);
  line-height: 1.75;
  margin: 0 0 20px 0;
}

.genera-fundacion-text:last-of-type {
  margin-bottom: 0;
}

.genera-fundacion-text.highlight {
  font-weight: 400;
  color: var(--darkblue);
  margin-top: 25px;
}

.genera-fundacion-text.highlight strong {
  color: var(--darkblue);
  font-weight: 700;
}

.genera-fundacion-wheel-col {
  display: flex;
  justify-content: center;
  align-items: center;
}

.genera-wheel-wrapper {
  position: relative;
  width: 100%;
  max-width: 440px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.genera-fundacion-wheel-img {
  width: 100%;
  height: auto;
  filter: drop-shadow(0 10px 25px rgba(12, 35, 64, 0.08));
  transition: var(--transition-smooth);
}

.genera-fundacion-wheel-img:hover {
  transform: scale(1.03);
  filter: drop-shadow(0 15px 30px rgba(12, 35, 64, 0.12));
}

@media (max-width: 991px) {
  .genera-fundacion {
    padding: 70px 0;
  }
  .genera-fundacion-grid {
    grid-template-columns: 1fr;
    gap: 50px;
    text-align: left;
  }
  .genera-fundacion-title {
    font-size: 2.5rem;
  }
  .genera-fundacion-text.highlight {
    padding-left: 15px;
  }
}
</style>

<div class="genera-container">
    <!-- SECTION 1: HERO BANNER -->
    <section class="genera-hero">
        <div class="genera-hero-content">
            <div class="genera-hero-logo">
                <img class="genera-logo-img" src="<?php echo $basePath; ?>logo-Genera.png" alt="">
            </div>
            <p class="genera-hero-tagline">Impulsamos el desarrollo del turismo&nbsp;sostenible</p>
        </div>
    </section>

    <!-- SECTION 2: FUNDACIÓN & GOBERNANZA -->
    <section class="genera-fundacion">
        <div class="genera-fundacion-grid">
            <div class="genera-fundacion-info">
                <h2 class="genera-fundacion-title">Fundación<br>Genera ITM</h2>
                <p class="genera-fundacion-text">
                    Somos una organización sin fines de lucro que impulsa el bienestar de las comunidades portuarias a través de programas basados en la gobernanza participativa, el turismo sostenible, la prosperidad local y el cuidado del entorno marino y costero.
                </p>
                <p class="genera-fundacion-text highlight">
                    Nuestras acciones se rigen a través de 3 pilares fundamentales: <strong>Prosperidad económica, Desarrollo comunitario y Protección del océano.</strong>
                </p>
            </div>
            <div class="genera-fundacion-wheel-col">
                <div class="genera-wheel-wrapper">
                    <img src="<?php echo $basePath; ?>gobernanza.png" alt="Gobernanza Portuaria" class="genera-fundacion-wheel-img">
                </div>
            </div>
        </div>
    </section>
</div>

<?php
if (function_exists('get_template_directory_uri')) {
    // Estamos en WordPress
    $basePath = get_template_directory_uri() . '/assets/perfiles/';
    get_footer();
} else {
    ?>
    </body>
    </html>
    <?php
}
?>
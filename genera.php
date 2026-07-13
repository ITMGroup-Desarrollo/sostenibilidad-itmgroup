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

if (!function_exists('render_svg')) {
    function render_svg($filename, $class = '', $folder = 'objetivos') {
        $filepath = __DIR__ . '/' . $folder . '/' . $filename;
        if (file_exists($filepath)) {
            $svg = file_get_contents($filepath);
            if ($class) {
                $svg = str_replace('<svg ', '<svg class="' . htmlspecialchars($class) . '" ', $svg);
            }
            echo $svg;
        } else {
            echo '<!-- SVG not found: ' . htmlspecialchars($filename) . ' -->';
        }
    }
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

/* SECTION 3: PILARES CARDS */
.genera-pilares {
  padding: 100px 0;
  background-color: var(--text-light);
  position: relative;
}

.genera-pilares-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 8px;
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 30px;
}

.genera-pilar-card {
  display: flex;
  flex-direction: column;
  background-color: var(--text-light);
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(12, 35, 64, 0.04);
  transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1), box-shadow 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
  cursor: pointer;
  height: 100%;
}

.genera-pilar-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 20px 40px rgba(12, 35, 64, 0.12);
}

.genera-pilar-img-wrapper {
  position: relative;
  width: 100%;
  height: 700px;
  overflow: hidden;
}

.genera-pilar-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.genera-pilar-card:hover .genera-pilar-img {
  transform: scale(1.05);
}

.genera-pilar-text-block {
  padding: 40px 30%;
  background-color: var(--darkblue);
  color: var(--text-light);
  transition: background-color 0.35s ease;
  display: flex;
  flex-direction: column;
  justify-content: center;
  flex-grow: 1;
}

.genera-pilar-card-title {
  font-size: 1.5rem;
  font-weight: 700;
  margin: 0 0 15px 0;
  line-height: 1.2;
}

.genera-pilar-card-description {
  font-size: 0.95rem;
  line-height: 1.2;
  margin: 0;
  opacity: 0.90;
}

/* Hover color shifts for individual pillars */
.pilar-prosperidad:hover .genera-pilar-text-block {
  background-color: var(--accent-orange);
}

.pilar-desarrollo:hover .genera-pilar-text-block {
  background-color: var(--accent-pink);
}

.pilar-oceano:hover .genera-pilar-text-block {
  background-color: var(--accent-blue);
}

@media (max-width: 991px) {
  .genera-pilares {
    padding: 70px 0;
  }
  .genera-pilares-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 25px;
  }
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
  .genera-pilar-text-block {
  padding: 40px 30px;
}
}

@media (max-width: 768px) {
  .genera-pilares-grid {
    grid-template-columns: 1fr;
    gap: 30px;
  }
  .genera-pilar-img-wrapper {
    height: 260px;
  }
  .genera-pilar-card.pilar-desarrollo {
    flex-direction: column;
  }
  .genera-pilar-card.pilar-desarrollo .genera-pilar-img-wrapper {
    order: -1;
  }
}

/* SECTION 4: OBJETIVOS ODS */
.genera-objetivos {
  padding: 100px 0;
  background-color: #ffffff;
  position: relative;
}

.genera-objetivos-wrapper {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 30px;
}

.genera-objetivos-title {
  font-size: 1.6rem;
  font-weight: 800;
  color: var(--darkblue);
  line-height: 1.3;
  margin: 0 0 50px 0;
  max-width: 900px;
  letter-spacing: -0.01em;
}

.genera-objetivos-grid {
  display: grid;
  grid-template-columns: 2.1fr 0.9fr;
  gap: 50px;
  align-items: start;
}

/* ODS Cards Grid */
.ods-cards-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 25px;
}

.ods-card {
  background-color: var(--text-light);
  border-radius: 20px;
  padding: 35px 25px;
  box-shadow: 0 10px 30px rgba(12, 35, 64, 0.03);
  border: 1px solid rgba(12, 35, 64, 0.04);
  cursor: pointer;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  position: relative;
  overflow: hidden;
  transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1), box-shadow 0.4s cubic-bezier(0.165, 0.84, 0.44, 1), border-color 0.3s ease;
  min-height: 220px;
  user-select: none;
}

.ods-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 40px rgba(12, 35, 64, 0.08);
  border-color: rgba(12, 35, 64, 0.08);
}

.ods-card-content {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 30px;
  width: 100%;
  margin-bottom: 25px;
  justify-items: center;
  align-items: center;
}

.ods-icon-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
}

.ods-svg-icon {
  width: 100%;
  max-width: 130px;
  height: auto;
  transition: filter 0.3s ease;
}

/* Bottom Lines */
.ods-card-line {
  height: 4px;
  width: 100%;
  background-color: #e2e8f0;
  border-radius: 2px;
  position: absolute;
  bottom: 25px;
  left: 25px;
  width: calc(100% - 50px);
  transition: background-color 0.35s ease;
}

/* Triple Line for card 4 */
.ods-card-line.line-triple {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 8px;
  background-color: transparent;
}

.line-segment {
  height: 4px;
  background-color: #e2e8f0;
  border-radius: 2px;
  transition: background-color 0.35s ease;
}

/* Inactive states */
.ods-card.inactive {
  opacity: 0.85;
}

.ods-card.inactive .ods-svg-icon {
  filter: grayscale(100%) opacity(0.28);
}

.ods-card.inactive .ods-card-line:not(.line-triple) {
  background-color: #e2e8f0;
}

.ods-card.inactive .line-segment {
  background-color: #e2e8f0;
}

/* Active states & Colors */
.ods-card.active {
  border-color: rgba(37, 61, 147, 0.1);
  box-shadow: 0 15px 35px rgba(37, 61, 147, 0.08);
}

/* Active bottom lines */
.ods-card.active .line-prosperidad { background-color: var(--accent-orange); }
.ods-card.active .line-comunitario { background-color: var(--accent-pink); }
.ods-card.active .line-oceano { background-color: var(--accent-blue); }

/* Card 4 active segments */
.ods-card.active .segment-prosperidad { background-color: var(--accent-orange); }
.ods-card.active .segment-comunitario { background-color: var(--accent-pink); }
.ods-card.active .segment-oceano { background-color: var(--accent-blue); }

/* Active ODS SVGs color mappings (when active, override default grey/color fills) */
.ods-card.active .icon-8 path:not([fill="none"]) { fill: #C12033 !important; }
.ods-card.active .icon-11 path:not([fill="none"]) { fill: #F89C25 !important; }
.ods-card.active .icon-5 path:not([fill="none"]) { fill: #FF3A21 !important; }
.ods-card.active .icon-10 path:not([fill="none"]) { fill: #DD1367 !important; }
.ods-card.active .icon-12 path:not([fill="none"]) { fill: #BF8D2C !important; }
.ods-card.active .icon-14 path:not([fill="none"]) { fill: #1F97D4 !important; }
.ods-card.active .icon-16 path:not([fill="none"]) { fill: #136A9F !important; }
.ods-card.active .icon-17 path:not([fill="none"]) { fill: #14496B !important; }

/* Right Column: Pillars Column */
.pillars-col {
  display: flex;
  flex-direction: column;
  gap: 35px;
  align-items: center;
  justify-content: center;
  padding-left: 20px;
  height: 100%;
}

.pillar-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  width: 140px;
  transition: transform 0.3s ease;
  user-select: none;
}

.pillar-item:hover {
  transform: scale(1.05);
}

.pillar-circle {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  background-color: #e2e8f0;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 12px;
  transition: background-color 0.4s ease, box-shadow 0.4s ease;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.02);
}

.pillar-label {
  font-size: 0.95rem;
  font-weight: 700;
  color: #94a3b8;
  line-height: 1.3;
  transition: color 0.4s ease;
}

/* Active states for pillars */
.pillar-item.active .pillar-label {
  color: var(--darkblue);
}

/* Active circular background and drop shadows */
.pillar-item.active[data-pillar="prosperidad"] .pillar-circle {
  background-color: var(--accent-orange);
  box-shadow: 0 10px 20px rgba(236, 136, 44, 0.25);
}
.pillar-item.active[data-pillar="comunitario"] .pillar-circle {
  background-color: var(--accent-pink);
  box-shadow: 0 10px 20px rgba(214, 0, 108, 0.25);
}
.pillar-item.active[data-pillar="oceano"] .pillar-circle {
  background-color: var(--accent-blue);
  box-shadow: 0 10px 20px rgba(27, 166, 210, 0.25);
}

/* Adjust SVG inside pillar-circle */
.svg-pillar {
  width: 80px;
  height: 80px;
}
.svg-pillar path {
  transition: fill 0.4s ease;
}

/* Control the background circle path in SVGs */
.pillar-item:not(.active) .svg-pillar path:first-of-type {
  fill: #AAAAAA !important;
}
.pillar-item.active[data-pillar="prosperidad"] .svg-pillar path:first-of-type {
  fill: var(--accent-orange) !important;
}
.pillar-item.active[data-pillar="comunitario"] .svg-pillar path:first-of-type {
  fill: var(--accent-pink) !important;
}
.pillar-item.active[data-pillar="oceano"] .svg-pillar path:first-of-type {
  fill: var(--accent-blue) !important;
}

/* Bottom Logo Footer */
.ods-footer {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 70px;
  padding-top: 20px;
}

.ods-footer-logo {
  height: auto;
  max-height: 55px;
  width: auto;
  max-width: 100%;
  object-fit: contain;
  opacity: 0.95;
  flex-shrink: 0;
}

/* Responsiveness for new section */
@media (max-width: 991px) {
  .genera-objetivos-grid {
    grid-template-columns: 1fr;
    gap: 60px;
  }
  .pillars-col {
    flex-direction: row;
    justify-content: space-around;
    padding-left: 0;
  }
  .genera-objetivos {
    padding: 70px 0;
  }
}

@media (max-width: 768px) {
  .ods-cards-grid {
    grid-template-columns: 1fr;
    gap: 20px;
  }
  .ods-card {
    min-height: auto;
    padding: 25px;
  }
  .ods-card-line {
    position: relative;
    bottom: 0;
    left: 0;
    width: 100%;
    margin-top: 15px;
  }
  .ods-card-line.line-triple {
    width: 100%;
  }
  .ods-card-content {
    margin-bottom: 10px;
  }
  .pillars-col {
    flex-wrap: wrap;
    gap: 25px;
  }
  .pillar-item {
    width: 110px;
  }
  .pillar-circle {
    width: 70px;
    height: 70px;
  }
  .svg-pillar {
    width: 70px;
    height: 70px;
  }
  .genera-objetivos-title {
    font-size: 1.6rem;
    margin-bottom: 35px;
  }
  .ods-footer-logo {
    width: 100%;
    max-width: 280px;
    height: auto;
  }
}

/* SECTION 5: PROGRAMAS EMBLEMA */
.genera-programas {
  padding: 100px 0;
  background-color: #ffffff;
  position: relative;
}

.genera-programas-wrapper {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 30px;
}

.genera-programas-title {
  font-size: 2.5rem;
  font-weight: 800;
  color: var(--darkblue);
  line-height: 1.25;
  text-align: center;
  margin: 0 0 60px 0;
  letter-spacing: -0.015em;
}

.programas-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 40px;
  margin-bottom: 70px;
}

.programa-card-wrapper {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100%;
}

.programa-card {
  position: relative;
  width: 100%;
  height: 230px;
  border-radius: 24px;
  overflow: hidden;
  cursor: pointer;
  box-shadow: 0 10px 30px rgba(12, 35, 64, 0.04);
  transition: transform 0.5s cubic-bezier(0.165, 0.84, 0.44, 1), box-shadow 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.programa-card-bg {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-size: cover;
  background-position: center;
  transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
  z-index: 1;
}

.programa-card-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(135deg, rgba(12, 35, 64, 0.82) 0%, rgba(37, 61, 147, 0.65) 100%);
  z-index: 2;
  transition: background 0.4s ease;
}

.programa-svg {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 3;
  width: auto;
  height: 62px;
  max-width: 80%;
  transition: transform 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
}

/* Make SVG path fill white by default inside card */
.programa-svg path {
  fill: #ffffff !important;
  transition: fill 0.4s ease;
}

.programa-label {
  font-size: 1.15rem;
  font-weight: 800;
  color: var(--darkblue);
  text-align: center;
  line-height: 1.35;
  margin: 20px 0 0 0;
  max-width: 90%;
}

/* Card Hover Interactions */
.programa-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 15px 35px rgba(12, 35, 64, 0.15);
}

.programa-card:hover .programa-card-bg {
  transform: scale(1.08);
}

.programa-card:hover .programa-svg {
  transform: translate(-50%, -50%) scale(1.2);
}

.programa-card:hover .programa-svg path {
  fill: #0098cc !important;
}

/* Cancun Center Footer Branding Block */
.programas-footer {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 80px;
  padding-top: 50px;
  border-top: 1px solid rgba(12, 35, 64, 0.05);
  text-align: center;
}

.cancun-center-logo {
  height: 70px;
  width: auto;
  margin-bottom: 30px;
}



.programas-footer-text {
  font-size: 1.05rem;
  color: var(--darkblue);
  line-height: 1.6;
  max-width: 820px;
  margin: 0 0 30px 0;
}

.instagram-block {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 6px;
}

.instagram-link {
  display: flex;
  align-items: center;
  gap: 8px;
  text-decoration: none;
  color: var(--darkblue);
  transition: color 0.3s ease;
}

.instagram-icon {
  width: 22px;
  height: 22px;
  fill: var(--darkblue);
  transition: fill 0.3s ease;
}

.instagram-handle {
  font-size: 1.05rem;
  font-weight: 800;
}

.instagram-link:hover {
  color: #0098cc;
}

.instagram-link:hover .instagram-icon {
  fill: #0098cc;
}

.instagram-subtext {
  font-size: 0.9rem;
  color: #94a3b8;
  font-weight: 500;
}

/* Responsive Rules for Programas */
@media (max-width: 991px) {
  .programas-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
  }
  .genera-programas-title {
    font-size: 2.2rem;
    margin-bottom: 50px;
  }
}

@media (max-width: 768px) {
  .programas-grid {
    grid-template-columns: 1fr;
    gap: 35px;
  }
  .programa-card {
    height: 210px;
  }
  .genera-programas {
    padding: 70px 0;
  }
  .genera-programas-title {
    font-size: 1.8rem;
    margin-bottom: 40px;
  }
  .programas-footer-text {
    font-size: 0.98rem;
    padding: 0 15px;
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

    <!-- SECTION 3: TARJETAS DE PILARES -->
    <section class="genera-pilares">
        <div class="genera-pilares-grid">
            <!-- Pilar 1: Prosperidad Económica -->
            <div class="genera-pilar-card pilar-prosperidad">
                <div class="genera-pilar-img-wrapper">
                    <!-- Placeholder: Beach cleaning / local community work. Replace src with your local image: <?php echo $basePath; ?>pilar-prosperidad.png -->
                    <img class="genera-pilar-img" src="https://images.unsplash.com/photo-1559136555-9303baea8ebd?q=80&w=600&auto=format&fit=crop" alt="Prosperidad económica">
                </div>
                <div class="genera-pilar-text-block">
                    <h3 class="genera-pilar-card-title">Prosperidad económica</h3>
                    <p class="genera-pilar-card-description">Integramos talento local a la actividad turística para generar ingresos dignos y sostenibles.</p>
                </div>
            </div>

            <!-- Pilar 2: Desarrollo Comunitario (Staggered Layout: Text on top, Image at bottom) -->
            <div class="genera-pilar-card pilar-desarrollo">
                <div class="genera-pilar-text-block">
                    <h3 class="genera-pilar-card-title">Desarrollo comunitario</h3>
                    <p class="genera-pilar-card-description">Fortalecemos el tejido social de la comunidad promoviendo la participación para lograr el bienestar colectivo.</p>
                </div>
                <div class="genera-pilar-img-wrapper">
                    <!-- Placeholder: Woven artisan bags. Replace src with your local image: <?php echo $basePath; ?>pilar-comunidad.png -->
                    <img class="genera-pilar-img" src="https://images.unsplash.com/photo-1596436889106-be35e843f974?q=80&w=600&auto=format&fit=crop" alt="Desarrollo comunitario">
                </div>
            </div>

            <!-- Pilar 3: Protección del Océano -->
            <div class="genera-pilar-card pilar-oceano">
                <div class="genera-pilar-img-wrapper">
                    <!-- Placeholder: Ocean scuba diving conservation. Replace src with your local image: <?php echo $basePath; ?>pilar-oceano.png -->
                    <img class="genera-pilar-img" src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?q=80&w=600&auto=format&fit=crop" alt="Protección del océano">
                </div>
                <div class="genera-pilar-text-block">
                    <h3 class="genera-pilar-card-title">Protección del océano</h3>
                    <p class="genera-pilar-card-description">Fomentamos la educación y participación local en las prácticas de conservación de los ecosistemas marinos y costeros.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 4: OBJETIVOS ODS -->
    <section class="genera-objetivos">
        <div class="genera-objetivos-wrapper">
            <h2 class="genera-objetivos-title">
                Nuestras líneas de acción tienen su base en los Objetivos de Desarrollo Sostenible de la Organización de las Naciones&nbsp;Unidas.
            </h2>
            
            <div class="genera-objetivos-grid">
                <!-- Left: Grid of 4 Cards -->
                <div class="ods-cards-grid">
                    <!-- Card 1: 8 & 11 (Prosperidad) -->
                    <div class="ods-card" data-group="prosperidad">
                        <div class="ods-card-content">
                            <div class="ods-icon-wrapper">
                                <?php render_svg('ods-08-trabajo-decente.svg', 'ods-svg-icon icon-8'); ?>
                            </div>
                            <div class="ods-icon-wrapper">
                                <?php render_svg('ods-11-ciudades-sostenibles.svg', 'ods-svg-icon icon-11'); ?>
                            </div>
                        </div>
                        <div class="ods-card-line line-prosperidad"></div>
                    </div>

                    <!-- Card 2: 5 & 10 (Desarrollo) -->
                    <div class="ods-card" data-group="comunitario">
                        <div class="ods-card-content">
                            <div class="ods-icon-wrapper">
                                <?php render_svg('ods-05-igualdad-genero.svg', 'ods-svg-icon icon-5'); ?>
                            </div>
                            <div class="ods-icon-wrapper">
                                <?php render_svg('ods-10-reduccion-desigualdades.svg', 'ods-svg-icon icon-10'); ?>
                            </div>
                        </div>
                        <div class="ods-card-line line-comunitario"></div>
                    </div>

                    <!-- Card 3: 12 & 14 (Oceano) -->
                    <div class="ods-card" data-group="oceano">
                        <div class="ods-card-content">
                            <div class="ods-icon-wrapper">
                                <?php render_svg('ods-12-produccion-consumo-responsable.svg', 'ods-svg-icon icon-12'); ?>
                            </div>
                            <div class="ods-icon-wrapper">
                                <?php render_svg('ods-14-vida-submarina.svg', 'ods-svg-icon icon-14'); ?>
                            </div>
                        </div>
                        <div class="ods-card-line line-oceano"></div>
                    </div>

                    <!-- Card 4: 16 & 17 (Todos) -->
                    <div class="ods-card" data-group="todos">
                        <div class="ods-card-content">
                            <div class="ods-icon-wrapper">
                                <?php render_svg('ods-16-paz-justicia.svg', 'ods-svg-icon icon-16'); ?>
                            </div>
                            <div class="ods-icon-wrapper">
                                <?php render_svg('ods-17-alianzas.svg', 'ods-svg-icon icon-17'); ?>
                            </div>
                        </div>
                        <div class="ods-card-line line-triple">
                            <div class="line-segment segment-prosperidad"></div>
                            <div class="line-segment segment-comunitario"></div>
                            <div class="line-segment segment-oceano"></div>
                        </div>
                    </div>
                </div>

                <!-- Right: Pillars Status List -->
                <div class="pillars-col">
                    <div class="pillar-item" data-pillar="prosperidad">
                        <div class="pillar-circle">
                            <?php render_svg('prosperidad-economica.svg', 'svg-pillar'); ?>
                        </div>
                        <span class="pillar-label">Prosperidad económica</span>
                    </div>
                    <div class="pillar-item" data-pillar="comunitario">
                        <div class="pillar-circle">
                            <?php render_svg('desarrollo-comunitario.svg', 'svg-pillar'); ?>
                        </div>
                        <span class="pillar-label">Desarrollo comunitario</span>
                    </div>
                    <div class="pillar-item" data-pillar="oceano">
                        <div class="pillar-circle">
                            <?php render_svg('proteccion-oceano.svg', 'svg-pillar'); ?>
                        </div>
                        <span class="pillar-label">Protección del océano</span>
                    </div>
                </div>
            </div>

            <!-- Footer: ODS Logo -->
            <div class="ods-footer">
                <img src="<?php echo $basePath; ?>objetivos/logo-ods.png" alt="Objetivos de Desarrollo Sostenible" class="ods-footer-logo">
            </div>
        </div>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const cards = document.querySelectorAll('.ods-card');
        const pillars = document.querySelectorAll('.pillar-item');

        function selectGroup(group) {
            // Set active card
            cards.forEach(card => {
                if (card.dataset.group === group) {
                    card.classList.add('active');
                    card.classList.remove('inactive');
                } else {
                    card.classList.remove('active');
                    card.classList.add('inactive');
                }
            });

            // Set active pillars on the right
            pillars.forEach(pillar => {
                const pType = pillar.dataset.pillar;
                let shouldBeActive = false;

                if (group === 'prosperidad' && pType === 'prosperidad') {
                    shouldBeActive = true;
                } else if (group === 'comunitario' && pType === 'comunitario') {
                    shouldBeActive = true;
                } else if (group === 'oceano' && pType === 'oceano') {
                    shouldBeActive = true;
                } else if (group === 'todos') {
                    shouldBeActive = true; // All three active
                }

                if (shouldBeActive) {
                    pillar.classList.add('active');
                } else {
                    pillar.classList.remove('active');
                }
            });
        }

        // Add click listeners to cards
        cards.forEach(card => {
            card.addEventListener('click', () => {
                selectGroup(card.dataset.group);
            });
        });

        // Select the first group (8 & 11) by default on load
        selectGroup('prosperidad');
    });
    </script>

    <!-- SECTION 5: PROGRAMAS EMBLEMA -->
    <section class="genera-programas">
        <div class="genera-programas-wrapper">
            <h2 class="genera-programas-title">Conoce nuestros programas emblema</h2>
            
            <div class="programas-grid">
                <!-- Card 1: Distintivo Puertos de Cruceros -->
                <div class="programa-card-wrapper">
                    <div class="programa-card">
                        <div class="programa-card-bg" style="background-image: url('https://images.unsplash.com/photo-1517760444937-f6397edcbbcd?q=80&w=600&auto=format&fit=crop');"></div>
                        <div class="programa-card-overlay"></div>
                        <div class="programa-svg">
                            <?php render_svg('distintivo-puertos-cruceros.svg', '', 'programas'); ?>
                        </div>
                    </div>
                    <p class="programa-label">Distintivo Puertos de Cruceros</p>
                </div>

                <!-- Card 2: Puertos y Comunidades circulares -->
                <div class="programa-card-wrapper">
                    <div class="programa-card">
                        <div class="programa-card-bg" style="background-image: url('https://images.unsplash.com/photo-1530521954074-e64f6810b32d?q=80&w=600&auto=format&fit=crop');"></div>
                        <div class="programa-card-overlay"></div>
                        <div class="programa-svg">
                            <?php render_svg('puertos-comunidades-circulares.svg', '', 'programas'); ?>
                        </div>
                    </div>
                    <p class="programa-label">Puertos y Comunidades circulares</p>
                </div>

                <!-- Card 3: Amora -->
                <div class="programa-card-wrapper">
                    <div class="programa-card">
                        <div class="programa-card-bg" style="background-image: url('https://images.unsplash.com/photo-1513519245088-0e12902e5a38?q=80&w=600&auto=format&fit=crop');"></div>
                        <div class="programa-card-overlay"></div>
                        <div class="programa-svg">
                            <?php render_svg('amora.svg', '', 'programas'); ?>
                        </div>
                    </div>
                    <p class="programa-label">Amora</p>
                </div>

                <!-- Card 4: Comité Local de Gobernanza -->
                <div class="programa-card-wrapper">
                    <div class="programa-card">
                        <div class="programa-card-bg" style="background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=600&auto=format&fit=crop');"></div>
                        <div class="programa-card-overlay"></div>
                        <div class="programa-svg">
                            <?php render_svg('comite-gobernanza-samana.svg', '', 'programas'); ?>
                        </div>
                    </div>
                    <p class="programa-label">Comité Local de Gobernanza para el Turismo Sostenible en Samaná</p>
                </div>

                <!-- Card 5: Centros Comunitarios -->
                <div class="programa-card-wrapper">
                    <div class="programa-card">
                        <div class="programa-card-bg" style="background-image: url('https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=600&auto=format&fit=crop');"></div>
                        <div class="programa-card-overlay"></div>
                        <div class="programa-svg">
                            <?php render_svg('centros-comunitarios-wayak.svg', '', 'programas'); ?>
                        </div>
                    </div>
                    <p class="programa-label">Centros Comunitarios</p>
                </div>

                <!-- Card 6: Tours Comunitarios -->
                <div class="programa-card-wrapper">
                    <div class="programa-card">
                        <div class="programa-card-bg" style="background-image: url('https://images.unsplash.com/photo-1502602898657-3e91760cbb34?q=80&w=600&auto=format&fit=crop');"></div>
                        <div class="programa-card-overlay"></div>
                        <div class="programa-svg">
                            <?php render_svg('tours-comunitarios.svg', '', 'programas'); ?>
                        </div>
                    </div>
                    <p class="programa-label">Tours Comunitarios</p>
                </div>
            </div>

            <!-- Footer: Cancun Center Logo & Text -->
            <div class="programas-footer">
                <div class="cancun-center-logo">
                    <?php render_svg('logo-fundacion-cancun-center.svg', '', 'programas'); ?>
                </div>
                <p class="programas-footer-text">
                    A través de Fundación Cancún Center, gestionamos alianzas con cada evento realizado en el Centro de Convenciones Cancún Center para impulsar proyectos comunitarios y ambientales en Quintana Roo.
                </p>
                <div class="instagram-block">
                    <a href="https://www.instagram.com/fundacioncancuncenter/" target="_blank" rel="noopener noreferrer" class="instagram-link">
                        <svg class="instagram-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051C.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/>
                        </svg>
                        <span class="instagram-handle">@fundacioncancuncenter</span>
                    </a>
                    <span class="programas-footer-text">Conoce más y síguenos en redes</span>
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
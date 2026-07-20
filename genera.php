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
  padding: 100px 0 0 0;
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

.genera-wheel-wrapper svg {
  width: 100%;
  height: auto;
  overflow: visible;
  filter: drop-shadow(0 10px 25px rgba(12, 35, 64, 0.08));
}

/* GOBERNANZA SVG INTERACTIVITY */
#Capa_6, #Capa_3, #Capa_4, #Capa_8 {
  cursor: pointer;
  transform-box: fill-box;
  transform-origin: center;
  transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1), filter 0.35s ease, opacity 0.35s ease;
}

#Capa_8 {
  filter: grayscale(100%);
  opacity: 0.85;
}

#Capa_7, #Capa_2, #Capa_5 {
  transform-box: fill-box;
  transform-origin: center;
  transition: opacity 0.4s ease, transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
  opacity: 0;
  pointer-events: none;
  transform: scale(0.6);
}

.gobernanza-segment {
  filter: grayscale(100%);
  opacity: 0.45;
}

#Capa_6:hover, #Capa_3:hover, #Capa_4:hover {
  transform: scale(1.1);
  filter: grayscale(0%) !important;
  opacity: 1 !important;
}

#Capa_8:hover, #Capa_8.active {
  transform: scale(1.06);
  filter: grayscale(0%) !important;
  opacity: 1 !important;
}

.gobernanza-segment.active {
  filter: grayscale(0%) !important;
  opacity: 1 !important;
}

.gobernanza-icon.active {
  opacity: 1 !important;
  pointer-events: auto !important;
  transform: scale(1) !important;
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
  padding: 35px 28px;
  background-color: var(--darkblue);
  color: var(--text-light);
  transition: background-color 0.35s ease;
  display: flex;
  flex-direction: row;
  align-items: center;
  gap: 20px;
  flex-grow: 1;
}

.pilar-icon-wrapper {
  flex-shrink: 0;
  width: 62px;
  height: 62px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: transform 0.35s ease;
}

.pilar-svg-icon {
  width: 100%;
  height: 100%;
  display: block;
}

.pilar-text-content {
  display: flex;
  flex-direction: column;
  flex-grow: 1;
}

.genera-pilar-card-title {
  font-size: 1.45rem;
  font-weight: 700;
  margin: 0 0 10px 0;
  line-height: 1.25;
}

.genera-pilar-card-description {
  font-size: 0.95rem;
  line-height: 1.4;
  margin: 0;
  opacity: 0.90;
}

/* Pillar SVG Fill Colors (Default state) */
.pilar-prosperidad .pilar-svg-icon path:first-of-type {
  fill: var(--accent-orange, #f1992a);
  transition: fill 0.35s ease;
}

.pilar-desarrollo .pilar-svg-icon path:first-of-type {
  fill: var(--accent-pink, #dc1680);
  transition: fill 0.35s ease;
}

.pilar-oceano .pilar-svg-icon path:first-of-type {
  fill: var(--accent-blue, #10acd7);
  transition: fill 0.35s ease;
}

.pilar-svg-icon path:not(:first-of-type) {
  fill: #ffffff;
  transition: fill 0.35s ease;
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

/* Hover SVG Icon Inversion */
.pilar-prosperidad:hover .pilar-svg-icon path:first-of-type,
.pilar-desarrollo:hover .pilar-svg-icon path:first-of-type,
.pilar-oceano:hover .pilar-svg-icon path:first-of-type {
  fill: #ffffff;
}

.pilar-prosperidad:hover .pilar-svg-icon path:not(:first-of-type) {
  fill: var(--accent-orange, #f1992a);
}

.pilar-desarrollo:hover .pilar-svg-icon path:not(:first-of-type) {
  fill: var(--accent-pink, #dc1680);
}

.pilar-oceano:hover .pilar-svg-icon path:not(:first-of-type) {
  fill: var(--accent-blue, #10acd7);
}

.genera-pilar-card:hover .pilar-icon-wrapper {
  transform: scale(1.08);
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
    padding: 70px 0 0 0;
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
    padding: 30px 24px;
  }
}

@media (max-width: 768px) {
  .genera-pilares-grid {
    grid-template-columns: 1fr;
    gap: 30px;
  }
  .genera-pilar-text-block {
    flex-direction: column;
    align-items: flex-start;
    gap: 16px;
    padding: 30px 24px;
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
  cursor: pointer;
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
  transition: transform 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.programa-svg svg {
  display: block;
  width: auto;
  height: 7rem !important;
  max-width: 80%;
  margin: 0 auto;
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
/* FULL-WIDTH VIDEO BANNER (BETWEEN SECTION 4 & SECTION 5) */
.genera-video-banner {
  width: 100vw;
  height: 95dvh;
  max-height: 95dvh;
  position: relative;
  left: 50%;
  right: 50%;
  margin-left: -50vw;
  margin-right: -50vw;
  overflow: hidden;
  line-height: 0;
  background-color: #000;
  display: flex;
  justify-content: center;
  align-items: center;
}

.genera-full-video {
  width: 100%;
  height: 95dvh;
  max-height: 95dvh;
  display: block;
  object-fit: cover;
}

/* PREVIEW OVERLAY & PLAY BUTTON */
.genera-video-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-size: cover;
  background-position: center;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 10;
  cursor: pointer;
  transition: opacity 0.5s ease, visibility 0.5s ease;
}

.video-overlay-backdrop {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(12, 35, 64, 0.35);
  transition: background 0.3s ease;
}

.genera-video-overlay:hover .video-overlay-backdrop {
  background: rgba(12, 35, 64, 0.2);
}

.genera-play-btn {
  position: relative;
  z-index: 12;
  width: 86px;
  height: 86px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.92);
  border: 3px solid #ffffff;
  color: #0C2340;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
  transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), background-color 0.3s ease, box-shadow 0.3s ease;
}

.genera-play-btn svg.play-icon {
  width: 36px;
  height: 36px;
  margin-left: 4px;
  fill: #0C2340;
  transition: fill 0.3s ease;
}

.genera-video-overlay:hover .genera-play-btn {
  transform: scale(1.12);
  background-color: #ffffff;
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.5);
}

.genera-video-overlay.hidden {
  opacity: 0;
  visibility: hidden;
  pointer-events: none;
}
/* SECTION 5: MODAL POPUP FOR PROGRAMS */
.programa-modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(12, 35, 64, 0.85);
  backdrop-filter: blur(8px);
  z-index: 9999;
  display: flex;
  justify-content: center;
  align-items: center;
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.4s ease;
}

.programa-modal-overlay.active {
  opacity: 1;
  pointer-events: auto;
}

.programa-modal-container {
  display: flex;
  align-items: stretch;
  gap: 30px;
  max-width: 1050px;
  width: 90%;
  max-height: 90vh;
  position: relative;
  transform: translateY(30px);
  transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.programa-modal-overlay.active .programa-modal-container {
  transform: translateY(0);
}

.programa-modal-box {
  flex: 1;
  background-color: #ffffff;
  border-radius: 28px;
  padding: 40px;
  position: relative;
  box-shadow: 0 25px 60px rgba(0, 0, 0, 0.2);
  display: flex;
  flex-direction: column;
  overflow-y: auto;
}

/* Close Button */
.modal-close-btn {
  position: absolute;
  top: 5px;
  right: 5px;
  background: none;
  border: none;
  font-size: 2.2rem;
  line-height: 1;
  color: var(--darkblue);
  cursor: pointer;
  z-index: 10;
  opacity: 0.6;
  transition: opacity 0.28s ease, transform 0.28s ease;
}

.modal-close-btn:hover {
  opacity: 1;
  transform: scale(1.1);
}

/* Modal Content Tabs */
.modal-tab-content {
  display: none;
  align-items: center;
  gap: 40px;
  height: 100%;
}

.modal-tab-content.active {
  display: flex;
}

/* Left side: Gallery */
.modal-gallery-wrapper {
  width: 46%;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.modal-gallery {
  width: 100%;
  height: 300px;
  border-radius: 20px;
  overflow: hidden;
  position: relative;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
}

.modal-slide {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-size: cover;
  background-position: center;
  opacity: 0;
  transition: opacity 0.8s ease-in-out;
  z-index: 1;
}

.modal-slide.active {
  opacity: 1;
  z-index: 2;
}

.modal-dots {
  display: flex;
  gap: 8px;
  margin-top: 15px;
}

.modal-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background-color: #cbd5e1;
  cursor: pointer;
  transition: background-color 0.3s ease, transform 0.3s ease;
}

.modal-dot.active {
  background-color: #0098cc;
  transform: scale(1.2);
}

/* Right side: Details */
.modal-details {
  width: 54%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  min-height: 300px;
}

.modal-details-title {
  font-size: 1.8rem;
  font-weight: 800;
  color: var(--darkblue);
  line-height: 1.3;
  margin: 0 0 20px 0;
}

.modal-details-text {
  font-size: 1.02rem;
  color: #475569;
  line-height: 1.6;
  margin: 0 0 25px 0;
}

.modal-details-text strong {
  color: var(--darkblue);
  font-weight: 700;
}

.modal-details-logo {
  display: flex;
  align-items: center;
  margin-top: auto;
  height: 48px;
}

.modal-details-logo svg {
  height: 48px;
  width: auto;
  max-width: 100%;
  display: block;
}

/* Right Column Sidebar */
.programa-modal-sidebar {
  width: 170px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  gap: 20px;
}

/* Sidebar mini cards dynamic styling wrapper */
.sidebar-slot {
  flex: 1;
  width: 100%;
  height: 95px;
  display: flex;
}

.sidebar-slot .programa-card {
  height: 100%;
  border-radius: 18px;
}

.sidebar-slot .programa-card .programa-svg svg {
  height: 2.8rem !important; /* Scale down SVG inside mini cards */
}

.sidebar-slot .programa-label {
  display: none; /* Hide labels under sidebar mini cards */
}

/* Active card highlight on sidebar */
.sidebar-slot[data-slot="active"] .programa-card {
  box-shadow: 0 0 0 3px #0098cc, 0 10px 25px rgba(0, 152, 204, 0.2);
  cursor: default;
  pointer-events: none;
}

/* Responsive Rules for Modal */
@media (max-width: 991px) {
  .programa-modal-container {
    flex-direction: column;
    max-height: 95vh;
    gap: 20px;
    width: 92%;
  }
  .programa-modal-box {
    padding: 30px;
    border-radius: 24px;
    overflow-y: auto;
  }
  .programa-modal-sidebar {
    width: 100%;
    flex-direction: row;
    height: 90px;
    gap: 15px;
  }
  .sidebar-slot {
    height: 90px;
  }
}

@media (max-width: 768px) {
  .modal-tab-content {
    flex-direction: column;
    gap: 25px;
  }
  .modal-gallery-wrapper {
    width: 100%;
  }
  .modal-gallery {
    height: 210px;
  }
  .modal-details {
    width: 100%;
    min-height: auto;
  }
  .modal-details-title {
    font-size: 1.45rem;
    margin-bottom: 12px;
  }
  .modal-details-text {
    font-size: 0.98rem;
    margin-bottom: 20px;
  }
  .modal-details-logo {
    height: 40px;
  }
  .modal-details-logo svg {
    height: 40px;
  }
  .programa-modal-sidebar {
    height: 80px;
    gap: 10px;
  }
  .sidebar-slot {
    height: 80px;
  }
  .sidebar-slot .programa-card .programa-svg svg {
    height: 2.2rem !important;
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
                    <?php 
                    $govSvg = __DIR__ . '/gobernanza.svg';
                    if (file_exists($govSvg)) {
                        echo file_get_contents($govSvg);
                    }
                    ?>
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
                    <div class="pilar-icon-wrapper">
                        <?php render_svg('prosperidad-economica.svg', 'pilar-svg-icon', 'objetivos'); ?>
                    </div>
                    <div class="pilar-text-content">
                        <h3 class="genera-pilar-card-title">Prosperidad económica</h3>
                        <p class="genera-pilar-card-description">Integramos talento local a la actividad turística para generar ingresos dignos y sostenibles.</p>
                    </div>
                </div>
            </div>

            <!-- Pilar 2: Desarrollo Comunitario (Staggered Layout: Text on top, Image at bottom) -->
            <div class="genera-pilar-card pilar-desarrollo">
                <div class="genera-pilar-text-block">
                    <div class="pilar-icon-wrapper">
                        <?php render_svg('desarrollo-comunitario.svg', 'pilar-svg-icon', 'objetivos'); ?>
                    </div>
                    <div class="pilar-text-content">
                        <h3 class="genera-pilar-card-title">Desarrollo comunitario</h3>
                        <p class="genera-pilar-card-description">Fortalecemos el tejido social de la comunidad promoviendo la participación para lograr el bienestar colectivo.</p>
                    </div>
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
                    <div class="pilar-icon-wrapper">
                        <?php render_svg('proteccion-oceano.svg', 'pilar-svg-icon', 'objetivos'); ?>
                    </div>
                    <div class="pilar-text-content">
                        <h3 class="genera-pilar-card-title">Protección del océano</h3>
                        <p class="genera-pilar-card-description">Fomentamos la educación y participación local en las prácticas de conservación de los ecosistemas marinos y costeros.</p>
                    </div>
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

        const pillarsCol = document.querySelector('.pillars-col');
        const odsCardsGrid = document.querySelector('.ods-cards-grid');

        // Add click listeners to cards
        cards.forEach(card => {
            card.addEventListener('click', () => {
                selectGroup(card.dataset.group);

                // Mobile auto-scroll down to pillars column
                if (window.innerWidth <= 991 && pillarsCol) {
                    pillarsCol.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            });
        });

        // Add click listeners to pillars (right SVGs/logos)
        pillars.forEach(pillar => {
            pillar.addEventListener('click', () => {
                selectGroup(pillar.dataset.pillar);

                // Mobile auto-scroll up to the illuminated card
                if (window.innerWidth <= 991) {
                    const targetGroup = pillar.dataset.pillar;
                    const targetCard = Array.from(cards).find(c => c.dataset.group === targetGroup);
                    if (targetCard) {
                        targetCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    } else if (odsCardsGrid) {
                        odsCardsGrid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            });
        });

        // Select the first group (8 & 11) by default on load
        selectGroup('prosperidad');

        // GOBERNANZA WHEEL INTERACTIVITY
        const segProsperidad = document.getElementById('Capa_6'); // Segment Prosperidad (Orange)
        const segComunitario = document.getElementById('Capa_3'); // Segment Comunitario (Pink)
        const segOceano = document.getElementById('Capa_4');     // Segment Oceano (Blue)
        const centerCircle = document.getElementById('Capa_8');  // Center Circle (Gobernanza)

        const iconProsperidad = document.getElementById('Capa_7'); // Icon Prosperidad (Orange)
        const iconComunitario = document.getElementById('Capa_2'); // Icon Comunitario (Pink)
        const iconOceano = document.getElementById('Capa_5');     // Icon Oceano (Blue)

        if (segProsperidad && segComunitario && segOceano && centerCircle) {
            segProsperidad.classList.add('gobernanza-segment');
            segComunitario.classList.add('gobernanza-segment');
            segOceano.classList.add('gobernanza-segment');

            if (iconProsperidad) iconProsperidad.classList.add('gobernanza-icon');
            if (iconComunitario) iconComunitario.classList.add('gobernanza-icon');
            if (iconOceano) iconOceano.classList.add('gobernanza-icon');

            // Initial state: Prosperidad segment + Prosperidad icon active at load
            setActiveSegment(segProsperidad, iconProsperidad);

            function setActiveSegment(activeSeg, activeIcon) {
                [segProsperidad, segComunitario, segOceano].forEach(s => s.classList.remove('active'));
                [iconProsperidad, iconComunitario, iconOceano].forEach(i => {
                    if (i) i.classList.remove('active');
                });
                centerCircle.classList.remove('active');

                if (activeSeg) activeSeg.classList.add('active');
                if (activeIcon) activeIcon.classList.add('active');
            }

            function activateAll() {
                [segProsperidad, segComunitario, segOceano].forEach(s => s.classList.add('active'));
                [iconProsperidad, iconComunitario, iconOceano].forEach(i => {
                    if (i) i.classList.add('active');
                });
                centerCircle.classList.add('active');
            }

            segProsperidad.addEventListener('click', () => setActiveSegment(segProsperidad, iconProsperidad));
            segComunitario.addEventListener('click', () => setActiveSegment(segComunitario, iconComunitario));
            segOceano.addEventListener('click', () => setActiveSegment(segOceano, iconOceano));

            centerCircle.addEventListener('click', activateAll);
        }

        // PROGRAMS MODAL INTERACTIVITY
        const modal = document.getElementById('programaModal');
        const closeModalBtn = document.getElementById('closeModal');
        const mainProgramCards = document.querySelectorAll('.genera-programas .programa-card');
        const tabContents = document.querySelectorAll('.modal-tab-content');
        
        const sidebarPrev = document.querySelector('.sidebar-slot[data-slot="previous"]');
        const sidebarActive = document.querySelector('.sidebar-slot[data-slot="active"]');
        const sidebarNext = document.querySelector('.sidebar-slot[data-slot="next"]');
        
        let currentProgramIndex = 0;
        let galleryInterval = null;

        function startAutoGallery(tabIndex) {
            // Clear existing gallery interval
            if (galleryInterval) {
                clearInterval(galleryInterval);
            }
            
            const activeTab = document.querySelector(`.modal-tab-content[data-program-index="${tabIndex}"]`);
            if (!activeTab) return;
            
            const slides = activeTab.querySelectorAll('.modal-slide');
            const dots = activeTab.querySelectorAll('.modal-dot');
            if (slides.length <= 1) return;
            
            let currentSlide = 0;
            
            // Set up pagination dots click handlers
            dots.forEach((dot, dotIdx) => {
                dot.onclick = (e) => {
                    e.stopPropagation();
                    goToSlide(dotIdx);
                };
            });
            
            function goToSlide(slideIdx) {
                slides.forEach(s => s.classList.remove('active'));
                dots.forEach(d => d.classList.remove('active'));
                
                currentSlide = slideIdx;
                slides[currentSlide].classList.add('active');
                dots[currentSlide].classList.add('active');
            }
            
            // Auto advance slide every 4 seconds
            galleryInterval = setInterval(() => {
                let nextSlide = (currentSlide + 1) % slides.length;
                goToSlide(nextSlide);
            }, 4000);
        }

        function updateSidebar(index) {
            const prevIndex = (index - 1 + 6) % 6;
            const activeIndex = index;
            const nextIndex = (index + 1) % 6;
            
            // Helper to populate a slot with a card clone
            function populateSlot(slotElement, targetIndex) {
                slotElement.innerHTML = '';
                const cardClone = mainProgramCards[targetIndex].cloneNode(true);
                
                // Set click handler on clone
                cardClone.addEventListener('click', (e) => {
                    e.preventDefault();
                    showProgram(targetIndex);
                });
                
                slotElement.appendChild(cardClone);
            }
            
            populateSlot(sidebarPrev, prevIndex);
            populateSlot(sidebarActive, activeIndex);
            populateSlot(sidebarNext, nextIndex);
        }

        function showProgram(index) {
            currentProgramIndex = index;
            
            // Show correct content tab
            tabContents.forEach(tab => {
                if (parseInt(tab.dataset.programIndex) === index) {
                    tab.classList.add('active');
                } else {
                    tab.classList.remove('active');
                }
            });
            
            // Reset active slides inside the active tab
            const activeTab = document.querySelector(`.modal-tab-content[data-program-index="${index}"]`);
            if (activeTab) {
                const slides = activeTab.querySelectorAll('.modal-slide');
                const dots = activeTab.querySelectorAll('.modal-dot');
                slides.forEach((s, i) => {
                    if (i === 0) s.classList.add('active');
                    else s.classList.remove('active');
                });
                dots.forEach((d, i) => {
                    if (i === 0) d.classList.add('active');
                    else d.classList.remove('active');
                });
            }
            
            // Populate previous, active, next mini-cards on the right
            updateSidebar(index);
            
            // Start slideshow timer
            startAutoGallery(index);
        }

        function openModal(index) {
            showProgram(index);
            modal.classList.add('active');
            document.body.style.overflow = 'hidden'; // Lock scroll
        }

        function closeModal() {
            modal.classList.remove('active');
            document.body.style.overflow = ''; // Unlock scroll
            if (galleryInterval) {
                clearInterval(galleryInterval);
            }
        }

        // Add click events to main page program cards
        mainProgramCards.forEach((card, index) => {
            card.addEventListener('click', () => {
                openModal(index);
            });
        });

        // Close button click
        closeModalBtn.addEventListener('click', closeModal);

        // Click outside modal box to close
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });

        // Close on ESC key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modal.classList.contains('active')) {
                closeModal();
            }
        });

        // VIDEO BANNER INTERACTIVITY
        const videoElement = document.getElementById('generaFundacionVideo');
        const videoOverlay = document.getElementById('generaVideoOverlay');

        if (videoElement && videoOverlay) {
            videoOverlay.addEventListener('click', () => {
                videoOverlay.classList.add('hidden');
                videoElement.play();
            });
        }
    });
    </script>
    <!-- FULL-WIDTH VIDEO BANNER -->
    <section class="genera-video-banner">
        <video id="generaFundacionVideo" class="genera-full-video" controls preload="metadata" poster="<?php echo $basePath; ?>preview-video.jpeg">
            <source src="<?php echo $basePath; ?>fundacion-genera.mp4" type="video/mp4">
            Tu navegador no soporta la reproducción de video.
        </video>

        <!-- Video Preview Overlay with Play Button -->
        <div id="generaVideoOverlay" class="genera-video-overlay" style="background-image: url('<?php echo $basePath; ?>preview-video.jpeg');">
            <div class="video-overlay-backdrop"></div>
            <button id="generaPlayBtn" class="genera-play-btn" aria-label="Reproducir video">
                <svg class="play-icon" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M8 5v14l11-7z"/>
                </svg>
            </button>
        </div>
    </section>
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
                <a href="https://www.instagram.com/fundacioncancuncenter/" target="_blank" rel="noopener noreferrer" class="instagram-link">
                    <div class="cancun-center-logo">
                        <?php render_svg('logo-fundacion-cancun-center.svg', '', 'programas'); ?>
                    </div>
                </a>
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
    <!-- PROGRAMS MODAL POPUP -->
    <div class="programa-modal-overlay" id="programaModal">
        <div class="programa-modal-container">
            <!-- Left Panel: Main Box -->
            <div class="programa-modal-box">
                <button class="modal-close-btn" id="closeModal">&times;</button>

                <!-- Program 1 Content Tab -->
                <div class="modal-tab-content" data-program-index="0">
                    <div class="modal-gallery-wrapper">
                        <div class="modal-gallery">
                            <div class="modal-slide active" style="background-image: url('https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=600&auto=format&fit=crop');"></div>
                            <div class="modal-slide" style="background-image: url('https://images.unsplash.com/photo-1517760444937-f6397edcbbcd?q=80&w=600&auto=format&fit=crop');"></div>
                            <div class="modal-slide" style="background-image: url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=600&auto=format&fit=crop');"></div>
                        </div>
                        <div class="modal-dots">
                            <span class="modal-dot active" data-slide-index="0"></span>
                            <span class="modal-dot" data-slide-index="1"></span>
                            <span class="modal-dot" data-slide-index="2"></span>
                        </div>
                    </div>
                    <div class="modal-details">
                        <div>
                            <h3 class="modal-details-title">Distintivo Puertos de Cruceros</h3>
                            <p class="modal-details-text">
                                Impulsamos la <strong>formación técnica y certificación en turismo de cruceros</strong> dirigida a personas de la comunidad local, para elevar la calidad de la atención a cruceristas, promover prácticas ambientales y generar empleo local remunerado y formal.
                            </p>
                        </div>
                        <div class="modal-details-logo">
                            <?php render_svg('logo.svg', '', 'programas/modal/distintivo-puertos'); ?>
                        </div>
                    </div>
                </div>

                <!-- Program 2 Content Tab -->
                <div class="modal-tab-content" data-program-index="1">
                    <div class="modal-gallery-wrapper">
                        <div class="modal-gallery">
                            <div class="modal-slide active" style="background-image: url('https://images.unsplash.com/photo-1530521954074-e64f6810b32d?q=80&w=600&auto=format&fit=crop');"></div>
                            <div class="modal-slide" style="background-image: url('https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=600&auto=format&fit=crop');"></div>
                            <div class="modal-slide" style="background-image: url('https://images.unsplash.com/photo-1531206715517-5c0ba140e2b8?q=80&w=600&auto=format&fit=crop');"></div>
                        </div>
                        <div class="modal-dots">
                            <span class="modal-dot active" data-slide-index="0"></span>
                            <span class="modal-dot" data-slide-index="1"></span>
                            <span class="modal-dot" data-slide-index="2"></span>
                        </div>
                    </div>
                    <div class="modal-details">
                        <div>
                            <h3 class="modal-details-title">Puertos y comunidades circulares</h3>
                            <p class="modal-details-text">
                                Generamos acciones que impulsan la <strong>reducción de plásticos de un solo uso</strong> y promovemos una <strong>gestión responsable de residuos</strong> en territorios portuarios, con el objetivo de proteger el océano.
                            </p>
                        </div>
                        <div class="modal-details-logo">
                            <?php render_svg('logo.svg', '', 'programas/modal/puertos-comunidades'); ?>
                        </div>
                    </div>
                </div>

                <!-- Program 3 Content Tab -->
                <div class="modal-tab-content" data-program-index="2">
                    <div class="modal-gallery-wrapper">
                        <div class="modal-gallery">
                            <div class="modal-slide active" style="background-image: url('https://images.unsplash.com/photo-1513519245088-0e12902e5a38?q=80&w=600&auto=format&fit=crop');"></div>
                            <div class="modal-slide" style="background-image: url('https://images.unsplash.com/photo-1509281373149-e957c6296406?q=80&w=600&auto=format&fit=crop');"></div>
                            <div class="modal-slide" style="background-image: url('https://images.unsplash.com/photo-1457369804613-52c61a468e7d?q=80&w=600&auto=format&fit=crop');"></div>
                        </div>
                        <div class="modal-dots">
                            <span class="modal-dot active" data-slide-index="0"></span>
                            <span class="modal-dot" data-slide-index="1"></span>
                            <span class="modal-dot" data-slide-index="2"></span>
                        </div>
                    </div>
                    <div class="modal-details">
                        <div>
                            <h3 class="modal-details-title">Amora</h3>
                            <p class="modal-details-text">
                                Promovemos el <strong>desarrollo económico, capacitación, acompañamiento y promoción</strong> de personas artesanas en lo local bajo un modelo de <strong>comercio justo y reinversión social</strong>.
                            </p>
                        </div>
                        <div class="modal-details-logo">
                            <?php render_svg('logo.svg', '', 'programas/modal/amora'); ?>
                        </div>
                    </div>
                </div>

                <!-- Program 4 Content Tab -->
                <div class="modal-tab-content" data-program-index="3">
                    <div class="modal-gallery-wrapper">
                        <div class="modal-gallery">
                            <div class="modal-slide active" style="background-image: url('https://images.unsplash.com/photo-1515187029135-18ee286d815b?q=80&w=600&auto=format&fit=crop');"></div>
                            <div class="modal-slide" style="background-image: url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?q=80&w=600&auto=format&fit=crop');"></div>
                            <div class="modal-slide" style="background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=600&auto=format&fit=crop');"></div>
                        </div>
                        <div class="modal-dots">
                            <span class="modal-dot active" data-slide-index="0"></span>
                            <span class="modal-dot" data-slide-index="1"></span>
                            <span class="modal-dot" data-slide-index="2"></span>
                        </div>
                    </div>
                    <div class="modal-details">
                        <div>
                            <h3 class="modal-details-title">Comité Local de Gobernanza para el Turismo Sostenible en Samaná</h3>
                            <p class="modal-details-text">
                                Fortalecemos la <strong>gobernanza portuaria</strong> al articular el diálogo entre actores locales para impulsar decisiones conjuntas que favorezcan la <strong>prosperidad económica, la protección del océano y el desarrollo comunitario</strong> en Samaná.
                            </p>
                        </div>
                        <div class="modal-details-logo">
                            <?php render_svg('logo.svg', '', 'programas/modal/comite-local'); ?>
                        </div>
                    </div>
                </div>

                <!-- Program 5 Content Tab -->
                <div class="modal-tab-content" data-program-index="4">
                    <div class="modal-gallery-wrapper">
                        <div class="modal-gallery">
                            <div class="modal-slide active" style="background-image: url('https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=600&auto=format&fit=crop');"></div>
                            <div class="modal-slide" style="background-image: url('https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?q=80&w=600&auto=format&fit=crop');"></div>
                            <div class="modal-slide" style="background-image: url('https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=600&auto=format&fit=crop');"></div>
                        </div>
                        <div class="modal-dots">
                            <span class="modal-dot active" data-slide-index="0"></span>
                            <span class="modal-dot" data-slide-index="1"></span>
                            <span class="modal-dot" data-slide-index="2"></span>
                        </div>
                    </div>
                    <div class="modal-details">
                        <div>
                            <h3 class="modal-details-title">Centros Comunitarios</h3>
                            <p class="modal-details-text">
                                Impulsamos el <strong>desarrollo comunitario</strong> en zonas portuarias a través de espacios de <strong>educación, cultura y emprendimiento sostenible</strong> que fortalecen el bienestar y la prosperidad compartida.
                            </p>
                        </div>
                        <div class="modal-details-logo">
                            <?php render_svg('logo.svg', '', 'programas/modal/centros-comunitarios'); ?>
                        </div>
                    </div>
                </div>

                <!-- Program 6 Content Tab -->
                <div class="modal-tab-content" data-program-index="5">
                    <div class="modal-gallery-wrapper">
                        <div class="modal-gallery">
                            <div class="modal-slide active" style="background-image: url('https://images.unsplash.com/photo-1502602898657-3e91760cbb34?q=80&w=600&auto=format&fit=crop');"></div>
                            <div class="modal-slide" style="background-image: url('https://images.unsplash.com/photo-1534008757030-27299c4371b6?q=80&w=600&auto=format&fit=crop');"></div>
                            <div class="modal-slide" style="background-image: url('https://images.unsplash.com/photo-1539635278303-d4002c07eae3?q=80&w=600&auto=format&fit=crop');"></div>
                        </div>
                        <div class="modal-dots">
                            <span class="modal-dot active" data-slide-index="0"></span>
                            <span class="modal-dot" data-slide-index="1"></span>
                            <span class="modal-dot" data-slide-index="2"></span>
                        </div>
                    </div>
                    <div class="modal-details">
                        <div>
                            <h3 class="modal-details-title">Tours Comunitarios</h3>
                            <p class="modal-details-text">
                                Desarrollamos e impulsamos <strong>tours comunitarios sostenibles</strong> que conectan a los visitantes con la <strong>riqueza cultural, natural e histórica local</strong>, generando beneficios económicos directos para las familias anfitrionas.
                            </p>
                        </div>
                        <!-- Logo is empty for Card 6 -->
                    </div>
                </div>
            </div>

            <!-- Right Panel: Sidebar stack of 3 slots -->
            <div class="programa-modal-sidebar">
                <div class="sidebar-slot" data-slot="previous"></div>
                <div class="sidebar-slot" data-slot="active"></div>
                <div class="sidebar-slot" data-slot="next"></div>
            </div>
        </div>
    </div>
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
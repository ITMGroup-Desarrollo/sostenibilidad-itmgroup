<?php
// wordpress

if (function_exists('get_template_directory_uri')) {
    // Estamos en WordPress
    if (!defined('ABSPATH')) {
        exit; // Exit if accessed directly
    }
}
/*
  Template Name: Perfiles
  Description: Plantilla personalizada para mostrar perfiles
*/

// Detectar entorno
if (function_exists('get_template_directory_uri')) {
    $basePath = get_template_directory_uri() . '/assets/perfiles/';
    get_header();
} else {
    $basePath = './';
}
// Detectar si el entorno es local (localhost, 127.0.0.1 o ::1)
$is_local = in_array($_SERVER['SERVER_NAME'], ['localhost', '127.0.0.1', '::1']);

// Forzar idioma inglés en entorno local
$lang = $is_local ? 'en' : (function_exists('Lang\\getLang') ? Lang\getLang() : 'en');
?>

<section id="genera" class="genera-section">
    <h1>Hola mundo</h1>
</section>

<?php
if (function_exists('get_template_directory_uri')) {
    // Estamos en WordPress
    $basePath = get_template_directory_uri() . '/assets/perfiles/';
    get_footer();
}
//  
?>


</html>
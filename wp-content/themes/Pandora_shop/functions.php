<?php
function pandora_register_menus() {
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'pandora'),
    ));
}
add_action('after_setup_theme', 'pandora_register_menus');

function pandora_enqueue_styles() {
    wp_enqueue_style('pandora-style', get_stylesheet_uri());
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');
    wp_enqueue_style('pandora-css', get_template_directory_uri() . '/assets/css/style.css');
}
add_action('wp_enqueue_scripts', 'pandora_enqueue_styles');

?>
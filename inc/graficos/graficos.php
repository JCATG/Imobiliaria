<?php

function add_custom_grafico()
{
    add_menu_page(
        'Grafico',
        'Graficos',
        'manage_options',
        'grafico-list',
        'display_grafico_page',
        'dashicons-chart-pie',
        25
    );
}
add_action('admin_menu', 'add_custom_grafico');

function display_grafico_page()
{
    $template_path = get_template_directory() . '/graficos.php';
    if (file_exists($template_path)) {
        include $template_path;
    } else {
        echo '<div class="wrap"><h1>Error: Template not found</h1></div>';
    }
}
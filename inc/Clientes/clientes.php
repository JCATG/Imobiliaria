
<?php

function add_custom_negociacao_menu()
{
    add_menu_page(
        'Oportunidade de Negocios',
        'Oportunidade de Negócios',
        'manage_options',
        'Negociação-list',
        'display_negociacao_page',
        'dashicons-businessman',
        25
    );
}
add_action('admin_menu', 'add_custom_negociacao_menu');

function display_negociacao_page()
{
    $template_path = get_template_directory() . '/negociacao.php';
    if (file_exists($template_path)) {
        include $template_path;
    } else {
        echo '<div class="wrap"><h1>Error: Template not found</h1></div>';
    }
}
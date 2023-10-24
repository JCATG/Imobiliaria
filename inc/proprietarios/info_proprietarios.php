
<?php

function add_custom_proprietarios_menu()
{
    add_menu_page(
        'Cadastro Proprietarios',
        'Cadastro Proprietarios',
        'manage_options',
        'proprietarios-list',
        'display_proprietarios_page',
        'dashicons-businessman',
        25
    );
}
add_action('admin_menu', 'add_custom_proprietarios_menu');

function display_proprietarios_page()
{
    $template_path = get_template_directory() . '/Proprietario.php';
    if (file_exists($template_path)) {
        include $template_path;
    } else {
        echo '<div class="wrap"><h1>Error: Template not found</h1></div>';
    }
}
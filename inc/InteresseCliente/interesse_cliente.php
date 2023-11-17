
<?php

function add_custom_interesse_menu()
{
    add_menu_page(
        'Interesse Cliente',
        'Interesses Clientes',
        'manage_options',
        'interesse-list',
        'display_interesse_page',
        'dashicons-businessman',
        25
    );
}
add_action('admin_menu', 'add_custom_interesse_menu');

function display_interesse_page()
{
    $template_path = get_template_directory() . '/interesseCliente.php';
    if (file_exists($template_path)) {
        include $template_path;
    } else {
        echo '<div class="wrap"><h1>Error: Template not found</h1></div>';
    }
}
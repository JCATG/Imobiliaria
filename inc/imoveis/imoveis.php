
<?php

function add_custom_imoveis_menu()
{
    add_menu_page(
        'Cdastro Imoveis',
        'Cadastro Imoveis',
        'manage_options',
        'imoveis-list',
        'display_imoveis_page',
        'dashicons-businessman',
        25
    );
}
add_action('admin_menu', 'add_custom_imoveis_menu');

function display_imoveis_page()
{
    $template_path = get_template_directory() . '/imoveis.php';
    if (file_exists($template_path)) {
        include $template_path;
    } else {
        echo '<div class="wrap"><h1>Error: Template not found</h1></div>';
    }
}
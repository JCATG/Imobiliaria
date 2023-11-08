<?php

/**
 * Enqueue scripts and styles tailwind css
 */
define('_S_VERSION', '1.0.0');

function tailwindcss_setup_scripts()
{
    wp_enqueue_style('tailwind_setup-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('tailwindcss_setup-style', 'rtl', 'replace');
    wp_enqueue_style('tailwindcss_output', get_template_directory_uri() . '/dist/output.css', array(), _S_VERSION);
}

add_action('wp_enqueue_scripts', 'tailwindcss_setup_scripts');

register_nav_menus(
    array(
        'my-main-menu' => 'Main Menu',
        'menu-footer' => 'Menu Footer'
    )
);

//Custom Post Type
require_once get_template_directory() . '/inc/custom-post-type/custom_post_type_casa.php';
require_once get_template_directory() . '/inc/custom-post-type/custom_post_type_apartamento.php';

//opções no admin
require_once get_template_directory() . '/inc/Clientes/clientes.php';
require_once get_template_directory() . '/inc/formulario/formulario-clientes.php';
require_once get_template_directory() . '/inc/proprietarios/info_proprietarios.php';
require_once get_template_directory() . '/inc/imoveis/imoveis.php';
require_once get_template_directory() . '/inc/newsletter/newsleter.php';
require_once get_template_directory() . '/inc/graficos/graficos.php';





//remove itens admin
require_once get_template_directory() . '/inc/remove-items/comentarios.php';
require_once get_template_directory() . '/inc/remove-items/posts.php';

//send email
require_once get_template_directory() . '/inc/email/email.php';

add_action('after_setup_theme', function () {
    add_role(
        'clientes',
        'Clientes',
        array(
            'read' => true,
            'edit_posts' => true,
            'upload_files' => true,
        )
    );
});

// config the page-home width principal

function set_custom_home_page_template($template)
{
    if (is_home()) {
        $template = locate_template(array('page-home.php'));
    }
    return $template;
}
add_filter('template_include', 'set_custom_home_page_template');


add_action('widgets_init', 'sidebar_corretores');

function sidebar_corretores()
{
    register_sidebar(
        array(
            'name' => 'Sidebar Corretores',
            'id' => 'sidebar-1',
            'description' => 'Sidebar to used to Corretores',
            'before_widget' => '<div class ="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
}
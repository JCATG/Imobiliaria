<?php
/**
 * Enqueue scripts and styles tailwind css
 */
define('_S_VERSION', '1.0.0');

 function tailwindcss_setup_scripts(){
    wp_enqueue_style('tailwind_setup-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('tailwindcss_setup-style','rtl', 'replace');
    wp_enqueue_style('tailwindcss_output', get_template_directory_uri(). '/dist/output.css', array(), _S_VERSION);

}

add_action('wp_enqueue_scripts', 'tailwindcss_setup_scripts');

register_nav_menus(
    array(
      'my-main-menu'=>'Main Menu',
      'menu-footer'=>'Menu Footer'
    )
);

//Custom POst Type
require_once get_template_directory() . '/inc/custom-post-type/custom_post_type_casa.php';

require_once get_template_directory() . '/inc/custom-post-type/custom_post_type_apartamento.php';



// config the page-home width principal

function set_custom_home_page_template($template) {
  if (is_home()) {
      $template = locate_template(array('page-home.php'));
  }
  return $template;
}
add_filter('template_include', 'set_custom_home_page_template');

<?php

function casas_custom_post_type() {

$labels = array(
    'name'                  => _x( 'Casas', 'Post Type General Name', 'text_domain' ),
    'singular_name'         => _x( 'Casa', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'             => __( 'Casas', 'text_domain' ), // Modificado para 'Casas'
    'name_admin_bar'        => __( 'Casa', 'text_domain' ), // Modificado para 'Casa'
    'archives'              => __( 'Item Archives', 'text_domain' ),
    'attributes'            => __( 'Item Attributes', 'text_domain' ),
    'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
    'all_items'             => __( 'Todas Casas', 'text_domain' ), // Modificado para 'All Casas'
    'add_new_item'          => __( 'Adiconar nova Casa', 'text_domain' ), // Modificado para 'Add New Casa'
    'add_new'               => __( 'Adiconar nova Casa', 'text_domain' ),
    'new_item'              => __( 'Nova Casa', 'text_domain' ), // Modificado para 'New Casa'
    'edit_item'             => __( 'Editar Casa', 'text_domain' ), // Modificado para 'Edit Casa'
    'update_item'           => __( 'Update Casa', 'text_domain' ), // Modificado para 'Update Casa'
    'view_item'             => __( 'Ver Casa', 'text_domain' ), // Modificado para 'View Casa'
    'view_items'            => __( 'Visitar Casas', 'text_domain' ), // Modificado para 'View Casas'
    'search_items'          => __( 'Procurar Casa', 'text_domain' ), // Modificado para 'Search Casa'
    'not_found'             => __( 'Não encontado', 'text_domain' ),
    'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'text_domain' ),
    'featured_image'        => __( 'Featured Image', 'text_domain' ),
    'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
    'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
    'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
    'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
    'items_list'            => __( 'Items list', 'text_domain' ),
    'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
    'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
);
$args = array(
    'label'                 => __( 'Casa', 'text_domain' ),
    'description'           => __( 'Post Type Description', 'text_domain' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail' ),
    'taxonomies'            => array( 'category', 'post_tag' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
'menu_icon'             =>'dashicons-admin-home'
);
register_post_type( 'casa', $args ); // Mantido como 'casa'

}
add_action( 'init', 'casas_custom_post_type', 0 );

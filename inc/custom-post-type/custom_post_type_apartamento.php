<?php
function custom_apartment_post_type()
{

    $labels = array(
        'name'                  => _x('Apartamentos', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Apartamento', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Apartamentos', 'text_domain'),
        'name_admin_bar'        => __('Apartamentos', 'text_domain'),
        'archives'              => __('Arquivos', 'text_domain'),
        'attributes'            => __('Atributos', 'text_domain'),
        'parent_item_colon'     => __('Parent Item:', 'text_domain'),
        'all_items'             => __('Todos Apartamentos', 'text_domain'),
        'add_new_item'          => __('Adicionar Apartamento', 'text_domain'),
        'add_new'               => __('Adicionar Apartamento', 'text_domain'),
        'new_item'              => __('Novo Apartamento', 'text_domain'),
        'edit_item'             => __('Editar Apartamento', 'text_domain'),
        'update_item'           => __('Atualizar Apartamento', 'text_domain'),
        'view_item'             => __('Visualizar Apartamento', 'text_domain'),
        'view_items'            => __('Visualizar Apartamentos', 'text_domain'),
        'search_items'          => __('Procurar Apartamentos', 'text_domain'),
        'not_found'             => __('Apartamento não encontrado', 'text_domain'),
        'not_found_in_trash'    => __('Apartamento não encontrado na lixeira', 'text_domain'),
        'featured_image'        => __('Imagem destacada', 'text_domain'),
        'set_featured_image'    => __('Selecionar imagem destacada', 'text_domain'),
        'remove_featured_image' => __('Remover imagem destacada', 'text_domain'),
        'use_featured_image'    => __('Usar como imagem destacada', 'text_domain'),
        'insert_into_item'      => __('Insert into item', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
        'items_list'            => __('Items list', 'text_domain'),
        'items_list_navigation' => __('Items list navigation', 'text_domain'),
        'filter_items_list'     => __('Filter items list', 'text_domain'),
    );
    $args = array(
        'label'                 => __('Apartamento', 'text_domain'),
        'description'           => __('Apartamentos', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array('title'),
        'taxonomies'            => array('category', 'post_tag'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'         => 'dashicons-admin-home',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type('apartamento', $args);
}
add_action('init', 'custom_apartment_post_type', 0);
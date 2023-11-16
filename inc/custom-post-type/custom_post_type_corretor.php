<?php
function custom_corretor_post_type()
{

    $labels = array(
        'name'                  => _x('Proprietarios', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Proprietario', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Proprietarios', 'text_domain'),
        'name_admin_bar'        => __('Proprietarios', 'text_domain'),
        'archives'              => __('Arquivos', 'text_domain'),
        'attributes'            => __('Atributos', 'text_domain'),
        'parent_item_colon'     => __('Parent Item:', 'text_domain'),
        'all_items'             => __('Todos Proprietarios', 'text_domain'),
        'add_new_item'          => __('Adicionar Proprietario', 'text_domain'),
        'add_new'               => __('Adicionar Proprietario', 'text_domain'),
        'new_item'              => __('Novo Proprietario', 'text_domain'),
        'edit_item'             => __('Editar Proprietario', 'text_domain'),
        'update_item'           => __('Atualizar Proprietario', 'text_domain'),
        'view_item'             => __('Visualizar Proprietario', 'text_domain'),
        'view_items'            => __('Visualizar Proprietarios', 'text_domain'),
        'search_items'          => __('Procurar Proprietarios', 'text_domain'),
        'not_found'             => __('Proprietario não encontrado', 'text_domain'),
        'not_found_in_trash'    => __('Proprietario não encontrado na lixeira', 'text_domain'),
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
        'label'                 => __('Proprietario', 'text_domain'),
        'description'           => __('Proprietarios', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array('title'),
        'taxonomies'            => array('category', 'post_tag'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'         => 'dashicons-businessman',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type('corretores', $args);
}
add_action('init', 'custom_corretor_post_type', 0);
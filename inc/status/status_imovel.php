<?php
function custom_post_status_metabox() {
    add_meta_box(
        'custom_post_status_metabox',
        'Status Imovel',
        'display_custom_post_status_metabox',
        'casa',
        'side',
        'high'
    );
}

add_action('add_meta_boxes', 'custom_post_status_metabox');

function display_custom_post_status_metabox($post) {
    $status = get_post_meta($post->ID, '_custom_post_status', true);
    ?>
    <label for="custom_post_status">Selecione o status:</label>
    <select name="custom_post_status" id="custom_post_status">
        <option value="alugado" <?php selected($status, 'alugado'); ?>>Alugado</option>
        <option value="disponivel" <?php selected($status, 'disponivel'); ?>>Disponível</option>
        <option value="vendido" <?php selected($status, 'vendido'); ?>>Vendido</option>
    </select>
    <?php
}
function save_custom_post_status($post_id) {
    if (isset($_POST['custom_post_status'])) {
        $status = sanitize_text_field($_POST['custom_post_status']);
        update_post_meta($post_id, '_custom_post_status', $status);
    }
}

add_action('save_post', 'save_custom_post_status');

function display_custom_post_status_column($columns) {
    $columns['custom_post_status'] = 'Status Imovel';
    return $columns;
}

add_filter('manage_edit-casa_columns', 'display_custom_post_status_column');

function display_custom_post_status_value($column, $post_id) {
    if ($column === 'custom_post_status') {
        $status = get_post_meta($post_id, '_custom_post_status', true);
        echo esc_html($status);
    }
}

add_action('manage_casa_posts_custom_column', 'display_custom_post_status_value', 10, 2);


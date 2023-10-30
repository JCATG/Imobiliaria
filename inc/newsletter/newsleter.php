<?php
function send_newsleter()
{
    if (isset($_POST['cad_newsleter'])) {
        global $wpdb;

        $table = $wpdb->prefix . 'newsleter';

        $charset_collate = $wpdb->get_charset_collate();
        $nome = isset($_POST['nome_new']) ? sanitize_text_field($_POST['nome_new']) : '';
        $email = isset($_POST['email_new']) ? sanitize_text_field($_POST['email_new']) : '';

        $sql = "CREATE TABLE IF NOT EXISTS $table (
            id INT NOT NULL AUTO_INCREMENT,
            nome varchar(250) NOT NULL,
            email varchar(250),
            PRIMARY KEY (id)
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        $wpdb->insert(
            $table,
            array(
                'nome' => $nome,
                'email' => $email,
            )
        );
    }
}
add_action('init','send_newsleter');

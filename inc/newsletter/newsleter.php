<?php
function send_newsleter()
{
    if (isset($_POST['cad_newsleter'])) {
        global $wpdb;

        $table = $wpdb->prefix . 'newsletter';

        $charset_collate = $wpdb->get_charset_collate();
        $nome = isset($_POST['nome_newsletter']) ? sanitize_text_field($_POST['nome_newsletter']) : '';
        $email = isset($_POST['email_newsletter']) ? sanitize_text_field($_POST['email_newsletter']) : '';
        $numero_quartos = isset($_POST['news_quarto']) ? sanitize_text_field($_POST['news_quarto']) : '';
        $com_garagem = isset($_POST['news_garagem']) ? sanitize_text_field($_POST['news_garagem']) : '';
        $qtd_banheiro = isset($_POST['news_banheiro']) ? sanitize_text_field($_POST['news_banheiro']) : '';
        $news_tipo_imovel = isset($_POST['news_tipo_imovel']) ? sanitize_text_field($_POST['news_tipo_imovel']) : '';


        $sql = "CREATE TABLE IF NOT EXISTS $table (
            id INT NOT NULL AUTO_INCREMENT,
            nome varchar(250) NOT NULL,
            email varchar(250),
            numero_quartos int,
            com_garagem varchar(5),
            qtd_banheiro varchar(5),
            tipo_imovel varchar(20),
            PRIMARY KEY (id)
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        $wpdb->insert(
            $table,
            array(
                'nome' => $nome,
                'email' => $email,
                'numero_quartos' => $numero_quartos,
                'com_garagem' => $com_garagem,
                'qtd_banheiro' => $qtd_banheiro,
                'tipo_imovel' => $news_tipo_imovel,
            )
        );
    }
}
add_action('init','send_newsleter');

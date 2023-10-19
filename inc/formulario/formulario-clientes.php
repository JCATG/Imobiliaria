<?php
session_start();

function send_email()
{
    if (isset($_POST['submit-form'])) {
        global $wpdb;

        $table = $wpdb->prefix . 'formulario';

        $charset_collate = $wpdb->get_charset_collate();

        // Recupera os valores que o usuário digitou no formulário
        $nome = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
        $email = isset($_POST['email']) ? sanitize_text_field($_POST['email']) : '';
        $celular = isset($_POST['form_cel']) ? sanitize_text_field($_POST['form_cel']) : '';
        $cidade = isset($_POST['cidade']) ? sanitize_text_field($_POST['cidade']) : '';
        $tipoImovel = isset($_POST['tipo_imovel']) ? sanitize_text_field($_POST['tipo_imovel']) : '';
        $finalidade = isset($_POST['finalidade']) ? sanitize_text_field($_POST['finalidade']) : '';
        $cidadeImovel = isset($_POST['cidade_imovel']) ? sanitize_text_field($_POST['cidade_imovel']) : '';
        $mensagem = isset($_POST['mensagem']) ? sanitize_text_field($_POST['mensagem']) : '';
        $arquivo = $_FILES['file'];
        $nomeArquivo = $arquivo['name'];
        $tipoArquivo = pathinfo($nomeArquivo, PATHINFO_EXTENSION);

        $uploads_dir = wp_upload_dir();
        $caminhoCompleto = $uploads_dir['path'] . '/' . $nomeArquivo;
        if (move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
            echo 'Upload feito com sucesso. O arquivo foi salvo em: ';
        }

        $mensagem_alert = '';

        if (empty($nome) || empty($email) || empty($celular) || empty($cidade) || empty($tipoImovel) || empty($finalidade) || empty($cidadeImovel) || empty($mensagem)) {
            $mensagem_alert = '<span style="color:red;">Alguns campos requerem sua atenção</span>';
        } else {
            $sql = "CREATE TABLE IF NOT EXISTS $table (
                id INT NOT NULL AUTO_INCREMENT,
                nome varchar(50) NOT NULL,
                email varchar(50),
                celular int,
                cidade varchar(50),
                tipoimovel varchar(50),
                finalidade varchar(50),
                cidadeimovel varchar(50),
                mensagem varchar(200),
                PRIMARY KEY (id)
                ) $charset_collate;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
            $existing_email = $wpdb->get_var($wpdb->prepare("SELECT email FROM $table WHERE email = %s", $email));

            if ($existing_email) {
                $mensagem_alert = '<span style="color: red;">Email já cadastrado, tente com outro email</span>';
            } else {
                $wpdb->insert(
                    $table,
                    array(
                        'nome' => $nome,
                        'email' => $email,
                        'celular' => $celular,
                        'cidade' => $cidade,
                        'tipoimovel' => $tipoImovel,
                        'finalidade' => $finalidade,
                        'cidadeimovel' => $cidadeImovel,
                        'mensagem' => $mensagem,
                    )
                );
                if (false !== $wpdb->insert_id) {
                    $mensagem_alert = '<span style="color: green;">Seus dados foram enviados com sucesso</span>';
                }
            }
        }
        $_SESSION['mensagem'] = $mensagem_alert;
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}

add_action('init', 'send_email');
?>

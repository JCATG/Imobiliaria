<?php
function send_email_to_registred_newsletter($post_id)
{
    // Verifique se é um post do tipo "casas"

    $post = get_post($post_id);
    $post_type = $post->post_type;
    $post_title = $post->post_title;
 

    // Verifique se é um post do tipo "casa" ou "apartamento"
    if ($post_type !== 'casa' && $post_type !== 'apartamento') {
        return;
    } else {

        // Obtenha os dados da tabela de newsletter
        global $wpdb;
        $resultados = $wpdb->get_results("SELECT nome, email FROM wp_newsleter");

        // Configurações do email
        $assunto = 'Nova casa disponível na imobiliária';

        foreach ($resultados as $resultado) {
            $nome = $resultado->nome;
            $email = $resultado->email;

            $mensagem = "Olá $nome, uma nova casa foi adicionada à imobiliária. Confira a casa <a href='" . get_permalink($post_id) . "'>$post_title</a> em nosso site. <br>";

            wp_mail($email, $assunto, $mensagem);
        }
    }
}
add_action('save_post', 'send_email_to_registred_newsletter');

<?php
function send_email_to_matching_subscribers($post_id)
{
    // Verifique se é um post do tipo "casa" ou "apartamento"
    $post = get_post($post_id);
    $post_type = $post->post_type;
    $post_title = $post->post_title;

    if ($post_type !== 'casa' && $post_type !== 'apartamento') {
        return;
    } else {
        // Obtenha as informações do imóvel que está sendo cadastrado
        $numero_quartos_post = get_field('numero_de_quartos', $post_id); // Substitua pelo campo correto
        $numero_banheiros_post = get_field('numero_de_banheiros', $post_id); // Substitua pelo campo correto
        $numero_garagem_post = get_field('cabem_quantos_carros', $post_id); // Substitua pelo campo correto

        // Obtenha os inscritos cujas preferências correspondem ao imóvel
        global $wpdb;
        $subscribers = $wpdb->get_results("SELECT nome, email, tipo_imovel FROM wp_newsletter WHERE 
        (tipo_imovel = 'casa' AND numero_quartos <= $numero_quartos_post AND qtd_banheiro <= $numero_banheiros_post AND com_garagem <= $numero_garagem_post) 
        OR 
        (tipo_imovel = 'apartamento' AND numero_quartos <= $numero_quartos_post AND qtd_banheiro <= $numero_banheiros_post AND com_garagem <= $numero_garagem_post)");

        // Configurações do email
        $assunto = 'Nova propriedade disponível na imobiliária';

        foreach ($subscribers as $subscriber) {
            $nome = $subscriber->nome;
            $email = $subscriber->email;
            $tipo_imovel = $subscriber->tipo_imovel;

            $mensagem = "Olá $nome, uma nova propriedade do tipo $tipo_imovel foi adicionada à imobiliária que corresponde às suas preferências. Confira a propriedade <a href='" . get_permalink($post_id) . "'>$post_title</a> em nosso site. <br>";

            wp_mail($email, $assunto, $mensagem);
        }
    }
}
add_action('save_post', 'send_email_to_matching_subscribers');

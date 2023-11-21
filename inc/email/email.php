
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
     $numero_quartos_post = get_field('numero_de_quartos', $post_id); 
     $numero_banheiros_post = get_field('numero_de_banheiros', $post_id);
     $numero_garagem_post = get_field('cabem_quantos_carros', $post_id); 

     // Obtenha os inscritos cujas preferências correspondem ao imóvel
     global $wpdb;
     $subscribers = $wpdb->get_results("SELECT nome, email, tipo_imovel FROM wp_newsletter WHERE 
     ((tipo_imovel = 'casa' AND numero_quartos <= $numero_quartos_post AND qtd_banheiro <= $numero_banheiros_post AND com_garagem <= $numero_garagem_post) 
     OR 
     (tipo_imovel = 'apartamento' AND numero_quartos <= $numero_quartos_post AND qtd_banheiro <= $numero_banheiros_post AND com_garagem <= $numero_garagem_post))
     AND
     tipo_imovel = '$post_type'");

     // Configurações do email
     $assunto = 'Nova propriedade disponível na imobiliária';

     foreach ($subscribers as $subscriber) {
        $nome = $subscriber->nome;
        $email = $subscriber->email;
        
        $mensagem = "Olá $nome, espero que esteja bem!. Temos ótimas notícias para você. Uma nova propriedade foi adicionada à nossa imobiliária e ela parece ser perfeita de acordo com as suas preferências.\nNão perca a chance! Confira mais detalhes sobre a propriedade no seguinte link: " . get_permalink($post_id) ."Fique à vontade para explorar e entrar em contato conosco se tiver alguma dúvida. Estamos aqui para ajudar! Atenciosamente";

         wp_mail($email, $assunto, $mensagem);
        }
    }
}
add_action('save_post', 'send_email_to_matching_subscribers');

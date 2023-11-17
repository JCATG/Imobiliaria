<?php
$numero_quartos = isset($_GET['qtd_quarto']) ? sanitize_text_field($_GET['qtd_quarto']) : '';
$numero_sala = isset($_GET['qtd_sala']) ? sanitize_text_field($_GET['qtd_sala']) : '';
$numero_banheiro = isset($_GET['qtd_banheiros']) ? sanitize_text_field($_GET['qtd_banheiros']) : '';
$vagas_garagem = isset($_GET['qtd_garagem']) ? sanitize_text_field($_GET['qtd_garagem']) : '';
$tipo_locacao = isset($_GET['mod_tipo_imovel']) ? sanitize_text_field($_GET['mod_tipo_imovel']) : '';


$args = array(
    'post_type' => $tipo_locacao,
    'posts_per_page' => 8, 
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'numero_de_quartos', 
            'value' => $numero_quartos,
            'compare' => '='
        ), 
        array(
            'key' => 'numero_de_banheiros', 
            'value' => $numero_banheiro,
            'compare' => '='
        ),
        array(
            'key' => 'numero_de_sala', 
            'value' => $numero_sala,
            'compare' => '='
        ),
        array(
            'key' => 'numero_de_banheiro', 
            'value' => $numero_banheiro,
            'compare' => '='
        ),
        array(
            'key' => 'tem_garagem', 
            'value' => $vagas_garagem,
            'compare' => '='
        )
       
    )
);

// Realiza a consulta
$query = new WP_Query($args);

echo '<pre>';
echo $query;
echo '</pre>';
?>

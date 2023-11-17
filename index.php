<style>
     .estilo_casa_desc_home {
    /* border: 1px solid red; */
    padding: 20px;
    background-color: #30475E;
    color: white;
  }
</style>
<?php
get_header();
$numero_quartos = isset($_GET['qtd_quarto']) ? sanitize_text_field($_GET['qtd_quarto']) : '';
$numero_sala = isset($_GET['qtd_sala']) ? sanitize_text_field($_GET['qtd_sala']) : '';
$numero_banheiro = isset($_GET['qtd_banheiros']) ? sanitize_text_field($_GET['qtd_banheiros']) : '';
$vagas_garagem = isset($_GET['qtd_garagem']) ? sanitize_text_field($_GET['qtd_garagem']) : '';
$tipo_locacao = isset($_GET['mod_tipo_imovel']) ? sanitize_text_field($_GET['mod_tipo_imovel']) : '';

$tem_garagem = isset($_GET['qtd_garagem']) && $_GET['qtd_garagem'] === "sim" ? 1 : 0;
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
            'key' => 'numero_de_sala',
            'value' => $numero_sala,
            'compare' => '='
        ),
        array(
            'key' => 'numero_de_banheiros',
            'value' => $numero_banheiro,
            'compare' => '='
        ),
        array(
            'key' => 'tem_garagem',
            'value' => $tem_garagem,
            'compare' => '='
        )

    )
);

// Realiza a consulta
$query = new WP_Query($args);

// echo '<pre>';
// print_r($query);
// echo '</pre>';
$posts = $query->posts;
if (empty($posts)) {
    echo 'nao encontrado';
} ?>
<div class="flex justify-center flex-wrap items-center gap-24 md:gap-24 lg:justify-around lg:flex-nowrap mx-auto md:flex-row lg:gap-8 element">
<?php
foreach ($posts as $post) { ?>
    <div class="estilo_casa_desc_home">
        <a href="<?php echo get_permalink() ?>">
            <div class="w-64">
                <img class="h-full largura_imagem" src="<?php echo get_field('foto_principal', $post->ID)  ?>">
                <p class="text-2xl mt-2"><?php echo get_field('cidade', $post->ID) ?></p>
                <p class="text-md mt-2"> <span class="text-sm">Bairro: </span> <?php echo get_field('bairro', $post->ID) ?></p>
                <p class="text-2xl mt-2 gap-2 flex items-center"><span class="text-sm"><?php echo get_field('casa_ou_apo', $post->ID) ?>:</span><span class="text-2xl"><?php echo get_field('aluguel', $post->ID) ?></span></p>
                <button class="w-full py-3 mt-2 bg-mybluepastel">
                    Ver mais
                </button>
            </div>
        </a>
    </div><?php }  ?>
</div>
<?php
get_footer();

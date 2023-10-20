<?php
$post_id = get_the_ID();
?>
<?php get_header(); ?>
<section>
  <section>

    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
      <style>
        html,
        body {
          position: relative;
          height: 100%;
        }

        body {
          background: #eee;
          font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
          font-size: 14px;
          color: #000;
          margin: 0;
          padding: 0;
        }

        .swiper {
          width: 100%;
          height: 100%;
        }

        .swiper-slide {
          text-align: center;
          font-size: 18px;
          background: #fff;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 400px;
        }

        .swiper-slide img {
          display: block;
          width: 433px;
          height: 433px;
          object-fit: cover;
        }

        .swiper-pagination {
          margin-top: 40px;
        }

        .icones {
          background-color: white;
          width: 60px;
          padding: 8px;
          border-radius: 4px;
        }

        .largura_imagem {
          height: 200px;

        }

        /* corretores */
        .area-corretor {
          transform: translateY(0px);
          animation: float 5s ease-in-out infinite;
        }

        @keyframes float {
          0% {
            transform: translateY(0px);
          }

          50% {
            transform: translateY(-30px);
          }

          100% {
            transform: translateY(0px);
          }
        }
      </style>
    </head>
    <div class="swiper mySwiper1 max-w-5xl">
      <div class="swiper-wrapper">
        <?php
        $images = get_field('galeria_de_fotos');

        if ($images) {
          foreach ($images as $image) {
        ?>
            <div class="swiper-slide">
              <img src="<?php echo $image; ?>" alt="">
            </div>
        <?php
          }
        }
        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
      var swiper1 = new Swiper(".mySwiper1", {
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });
      var swiper2 = new Swiper(".mySwiper2", {
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });
    </script>
  </section>
  <section>
    <div class="sm:flex flex-col md:flex md:flex-row max-w-5xl mx-auto justify-between items-center text-white">
      <div class="w-4/6 mx-auto md:mx-0">
        <div>
          <div class="mt-8">
            <div class="bg-slate-800 w-full md:w-2/4 h-12 px-2 flex items-center">
              <p class="text-3xl flex items-center">
                <?php echo get_field('casa_ou_apo', $post->ID) ?> R$:<?php echo get_field('aluguel') ?>
              </p>
            </div>
          </div>
          <div class="mt-16 border bg-gray-100 text-slate-800 py-4 px-4">
            <p class="text-center mt-2 text-md uppercase mx-2 md:text-start">Informações da casa</p>
            <div class="gap-6 mx-2 flex justify-around flex-wrap  mt-4">
              <?php
              $count = 0;
              while (have_rows('repetidor_icones')) : the_row();
                if (have_rows('icones')) :
                  while (have_rows('icones')) : the_row();
                    $count++;
                    $icone_area_e_lazer = get_sub_field('imagem_icones');
                    $descricao_area_e_lazer = get_sub_field('descricao_comodos');
                    if ($count <= 3) {
                      $class = 'w-24 md:w-24 lg:w-24';
                    } else {
                      $class = 'w-24 sm:w-24 lg:w-24 ';
                      //width 126pxs5 
                    }
              ?>
                    <div gray="não" class="<?php echo $class; ?> bg-gray_f_5 flex flex-col items-center sm:py-2 my-2 justify-center h-24 rounded-lg">
                      <img class="p-2" src="<?php echo $icone_area_e_lazer; ?>" alt="">
                      <p class="text-xs text-center"><?php echo $descricao_area_e_lazer; ?></p>
                    </div>
              <?php
                    if ($count === 3) {
                      echo '</div><div class="gap-6 mx-2 flex justify-around flex-wrap  mt-4">';
                    }
                  endwhile;
                endif;
              endwhile;
              ?>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="w-1/3 mt-8 sm:mt-8 md:mt-0">
          <div class="w-60 h-60 mx-4 border bg-grennCorretor px-3 py-3 text-white area-corretor">
            <div class="flex flex-col gap-5">
              <h1 class="text-sm text-center">Fale com Um corretor</h1>
              <img src="" alt="">
              <p class="text-3xl text-center">Whatsaap</p>
              <a href="" class="text-center">
                <button class="text-black bg-white mt-6 py-3 px-2 hover:bg-grennHover">Envie uma Mensagem</button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="max-w-5xl mx-auto mt-6">
      <div class="swiper mySwiper2 max-w-5xl">
        <div class="swiper-wrapper">
          <?php $args = ['post_type' => 'casa'];
          $query = new WP_Query($args);
          foreach ($query->posts as $post) { ?>
            <div class="estilo_casa_desc_home">
              <a href="<?php echo get_permalink() ?>">
                <div class="w-64">
                  <img class="h-full largura_imagem" src="<?php echo get_field('foto_principal', $post->ID)  ?>">
                  <p class="text-2xl mt-2">Cidade:<?php echo get_field('cidade', $post->ID) ?></p>
                  <p class="text-2xl mt-2">Bairro:<?php echo get_field('bairro', $post->ID) ?></p>
                  <p class="text-2xl mt-2"><?php echo get_field('casa_ou_apo', $post->ID) ?>:R$ <?php echo get_field('aluguel', $post->ID) ?></p>
                  <ul class="flex flex-wrap">
                    <li><?php echo get_field('numero_de_quartos', $post->ID) ?> Quartos/</li>
                    <li><?php echo get_field('numero_de_sala', $post->ID) ?> Salas /</li>
                    <li><?php echo get_field('numero_de_cozinha', $post->ID) ?>Cozinha /</li>
                    <li><?php echo get_field('numero_de_banheiros', $post->ID) ?>Banheiro /</li>
                    <li><?php echo get_field('cabem_quantos_carros', $post->ID) ?>Garagem /</li>
                  </ul>
                </div>
              </a>
            </div>
          <?php }
          ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
    <div class="mx-5 lg:mt-12 bg-red-500 px-3 py-3 mb-4 max-w-5xl lg:mx-auto">
      <h2>Central Para negocio</h2>
      <p>
        Supremma Imóveis
        Rua Capitão Avelino Bastos, 765 - Centro
        Cruzeiro / São Paulo – CEP 12.701-440
        (12) 3211-8685 / (12) 99152-4814
        CRECI- 32590 J
        atendimento@supremmaimoveis.com.br
      </p>
    </div>
  </section>

</section>
<?php get_footer(); ?>
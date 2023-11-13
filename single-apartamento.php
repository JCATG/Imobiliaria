<?php
$post_id = get_the_ID();
?>
<?php get_header(); ?>
<section class="bg-graypage">
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
          margin-right: 0 !important;
        }

        .swiper-slide img {
          display: block;
          width: 534px;
          height: 433px;
          object-fit: cover;
        }

        @media only screen and (max-width:764px) {
          .swiper-slide img {
            width: 100%;
          }
        }

        .swiper-pagination {
          margin-top: 40px;
        }

        .swiper-pagination-bullet {
          background-color: white;
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
    <div class="swiper mySwiper1">
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
          el: ".mySwiper1 .swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          280: {
            slidesPerView: 1,
            spaceBetween: 10,
          },
          480: {
            slidesPerView: 1,
            spaceBetween: 10,
          },
          768: {
            slidesPerView: 2,
            spaceBetween: 10,
          },
          992: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          1200: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
        },
      });
      var swiper2 = new Swiper(".mySwiper2", {
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
          el: ".mySwiper2 .swiper-pagination",
          clickable: true,
        },
      });
    </script>
  </section>
  <section>
    <div class="sm:flex flex-col md:flex md:flex-row max-w-5xl mx-auto justify-between items-center text-white">
      <div class="w-11/12 md:w-4/6 mx-auto md:mx-0">
        <div class="md:mx-2 lg:mx-0">
          <div class="mt-8">
            <div class="bg-myblue w-full md:w-2/4 p-4 px-2 flex items-center">
              <p class="text-3xl flex items-center">
                <?php echo get_field('casa_ou_apo', $post->ID) ?> R$:<?php echo get_field('aluguel') ?>,00
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
          <div class="w-full bg-mybluepastel mt-4">
            <div class="mx-4 w-3/4 flex flex-col">
              <div>
                <p class="uppercase my-2">Informações detalhadas</p>
                <p>Essa belissima casa se encontra em um otimo estado de conservação, se encontra na Rua
                  <?php echo get_field('rua', $post->ID) ?>, no numero <?php echo get_field('numero_da_casa', $post->ID) ?>. <br>
                  Tem como ponto de referência: <?php echo get_field('complemento', $post->ID) ?> <br>
                  Alem das Informações Acima. <br>
                  Possui <br>
              </div>
              <div class="flex flex-wrap gap-2">
                <?php echo get_field('numero_de_quartos', $post->ID) ?>: Quartos 
                <?php echo get_field('numero_de_sala', $post->ID) ?>: Sala de estar 
                <?php echo get_field('numero_de_banheiros', $post->ID) ?>: Banheiros
                <?php echo get_field('cabem_quantos_carros', $post->ID) ?>: Garagem
                <?php echo get_field('numero_de_quartos', $post->ID) ?>: Quartos 
                <?php echo get_field('numero_de_quartos', $post->ID) ?>: Quartos 
              </div>
              <div class="flex flex-col">
                <p>Tem Suite: <?php echo get_field('tem_suite', $post->ID) ?></p>
                <p>Tem Piscina: <?php echo get_field('tem_piscina', $post->ID) ?></p>
                <p>Tem Area de lazer: <?php echo get_field('tem_area_de_lazer', $post->ID) ?></p>
                <p>Tem Area de serviço: <?php echo get_field('tem_area_de_serviço', $post->ID) ?></p>
              </div>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="flex justify-center md:justify-normal">
        <div class="md:w-1/3 mt-8 sm:mt-8 md:mt-0">
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
  <section">
    <div class="max-w-5xl mx-auto mt-6">
      <div class="max-w-5xl">
        <div class="flex flex-wrap gap-2 justify-center mb-4 md:mb-0 md:justify-normal">
          <?php $args = ['post_type' => 'apartamento'];
          $query = new WP_Query($args);
          foreach ($query->posts as $post) { ?>
            <div class="px-4 py-4 bg-myblue text-white">
              <a href="<?php echo get_permalink() ?>">
                <div class="w-64">
                <img class="h-full largura_imagem" src="<?php echo get_field('foto_principal', $post->ID)  ?>">
                  <p class="text-2xl mt-2"><?php echo get_field('cidade', $post->ID) ?></p>
                  <p class="text-md mt-2"> <span class="text-sm">Bairro:</span> <?php echo get_field('bairro', $post->ID) ?></p>
                  <p class="text-2xl mt-2 gap-2"><span class="text-sm"><?php echo get_field('casa_ou_apo', $post->ID) ?></span>R$<?php echo get_field('aluguel', $post->ID) ?></p>
                  <button class="w-full py-3 mt-2 bg-mybluepastel">
                    Ver mais
                  </button>
                </div>
              </a>
            </div>
          <?php }
          ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
    <div class="mx-5 lg:mt-12 bg-myblue px-3 py-3 mb-4 max-w-5xl lg:mx-auto">
      <h2>Central Para negocio</h2>
      <p class="w-11/12 md:w-full">
        Satin Imóveis
        Rua Capitão Avelino Bastos, 765 - Centro
        Cruzeiro / São Paulo – CEP 11.111-1110
        (12) 3211-2121/ (12) 12345-1239
      </p>
    </div>
</section>
<?php get_footer(); ?>
</section>
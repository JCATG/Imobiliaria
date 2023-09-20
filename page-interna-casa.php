  <?php

  /**
   *
   *  Template Name: Pagina Interna Casa
   *
   */

  ?>

  <?php get_header(); ?>
  <section>
    <section>

      <head>
        <meta charset="utf-8" />
        <title>Swiper demo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

        <!-- Demo styles -->
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

          .custom-color {
            background-color: #137868;
            color: #fff;
          }

          .bg-gren {
            background-color: #2f4f4f;
          }

          .animation:hover span {
            margin-left: 5px;
            transition: margin-left 0.5s ease;
          }
        </style>
      </head>

      <body>
        <!-- Swiper -->
        <div class="swiper mySwiper max-w-5xl">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img class="h-full b" src="<?php echo get_template_directory_uri() . '/assets/imagens/casa1.jpg'; ?>" alt="erro">
            </div>
            <div class="swiper-slide">
              <img class="h-full b" src="<?php echo get_template_directory_uri() . '/assets/imagens/casa2.jpg'; ?>" alt="erro">
            </div>
            <div class="swiper-slide">
              <img class="h-full b" src="<?php echo get_template_directory_uri() . '/assets/imagens/casa3.jpg'; ?>" alt="erro">

            </div>
            <div class="swiper-slide">
              <img class="h-full b" src="<?php echo get_template_directory_uri() . '/assets/imagens/casa4.jpg'; ?>" alt="erro">

            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper -->
        <script>
          var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            pagination: {
              el: ".swiper-pagination",
              clickable: true,
            },
          });
        </script>
      </body>
    </section>
    <section>
      <div class="sm:flex flex-col md:flex md:flex-row max-w-5xl mx-auto justify-between items-center text-white">
        <div class="w-4/6">
          <div>
            <div class="mt-8">
              <div class="bg-slate-700 w-2/4 h-12 px-2 flex items-center">
                <p class="text-3xl">560.00</p>
              </div>
            </div>
            <div class="mt-16 border bg-gray-600 text-white md:mx-4">
              <p class="mt-8 text-md uppercase mx-2">Informações da casa</p>
              <div class="mx-2 flex flex-wrap gap-3 mt-4">
                <p>1 quarto</p>
                <p>1 Cozinha</p>
                <p>1 garagem</p>
                <p>1 Banheiro</p>
                <p>1 Suite</p>
                <p>1 Area de Lazer</p>
                <p>1 Sala</p>
              </div>
            </div>

          </div>

          <div class="mt-12 bg-red-500 px-3 py-3 mb-4">
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
        </div>
        <div>
          <div class="w-1/3">
            <div class="w-60 h-60 mx-4 border bg-red-500 px-3 py-3 text-white">
              <div class="flex flex-col gap-5">
                <h1>Fale com Um corretor</h1>
                <img src="" alt="">
                <p>Julio Cesar</p>
                <p>Corretor de Imoveis</p>
                <button class="animation text-white bg-red-700 mt-6 py-3 px-2">Envie uma Mensagem <span> >></span></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </section>
  <?php get_footer(); ?>
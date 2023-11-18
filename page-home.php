<?php

/**
 *
 *  Template Name: Page Home
 *
 */

?>
<?php get_header(); ?>
<?php get_template_part('/inc/newsletter/newsleter.php') ?>
<style>
  html {
    scroll-behavior: smooth;
  }

  /* Estilize os elementos ocultos */
  .element {
    opacity: 0;
    /* Comece com a opacidade 0 para escondê-los */
    transform: translateY(20px);
    /* Mova-os para baixo */
    transition: opacity 0.5s, transform 2s;
    /* Adicione uma transição suave */
  }

  /* Adicione uma classe para mostrar os elementos quando visíveis na janela de visualização */
  .element.visible {
    opacity: 1;
    transform: translateY(0);
  }

  /* Ajustando largura das imagens do apo e casa na home */
  .largura_imagem {
    height: 200px;
  }

  .imagem {
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/imagens/home.jpg');
    width: 100%;
    min-height: 700px;
    background-size: cover;
    position: relative;
    background-position: center center;

  }

  .imagem::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    /* Cor da sombra com transparência */
    z-index: 1;
    /* Certifique-se de que a sombra esteja acima da imagem de fundo */
  }

  .popup-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 999;
    justify-content: center;
    align-items: center;
  }

  .popup-content {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    width: 400px;
    min-height: 400px;
    max-width: 90%;
    text-align: center;
    background: #30475e;
    margin-bottom: 50px;
  }

  #closePopup {
    display: block;
    margin-top: 10px;
    cursor: pointer;
  }

  @media only screen and (max-width:480px) {
    .area-corretores {
      width: 80%;
    }
  }

  .estilo_casa_desc_home {
    /* border: 1px solid red; */
    padding: 20px;
    background-color: #30475E;
    color: white;
  }

  /* Corretores */
  .corretores .widget-wrapper {
    margin-top: 12px;
  }

  .widget-wrapper figure img {
    border-radius: 100%;
  }

  select {
    padding: 10px;
    width: 100%;
    margin-top: 12px;

  }

  .formulario_newsletter input {
    padding: 12px;
    width: 100%;
  }

  @media only screen and (max-width:600px) {
    .widget-wrapper figure img {
      width: unset;
    }

    .corretores .widget-wrapper .alignwide {
      display: flex;
      justify-content: center;
      align-items: center;
    }
  }
</style>

<body>
  <section>
    <div class="imagem">
      <div class="flex items-center justify-center text-center h-screen">
        <h1 class="sm:text-2xl mx-2 md:text-3xl lg:text-4xl lg:mx-0 text-white z-10 relative"></h1>
        <h1 class="sm:text-2xl mx-2 md:text-3xl lg:text-4xl lg:mx-0 text-white z-10 relative">
          <?php echo get_field('_home_title'); ?>
        </h1>
      </div>
    </div>
  </section>

  <section>
    <!--CASAS EM DESTAQUE -->
    <div class="bg-graypage" id="casa">
      <div class="max-w-5xl mx-auto justify-center items-center pt-6 pb-6 element">
        <div class="bg-pink_100 flex items-center justify-center rounded-full w-12 h-12 text-white_100 hover:bg-white_100 hover:text-pink_100 cursor-pointer" id="modalTrigger">
          <i class="ph ph-funnel text-2xl"></i>
        </div>
        <form action="<?php echo esc_url(home_url('/busca')); ?>" method="get">
          <div class="bg-myblue text-white absolute z-10 rounded-lg shadow-lg mt-2" style="width: 320px; height: 500px; display: none;" id="modal">
            <div class="mx-4 my-6">
              <div>
                <p class="uppercase">Filtrar Imoveis</p>
              </div>
              <div class="py-1">
                <p>Quartos</p>
                <div>
                  <select class="bg-mybluepastel text-white p-2 mt-2 w-full bg-white_100 text-preto_500 input-text-filter" id="mod_tipo_quarto" name="qtd_quarto">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="mais">3+</option>
                  </select>
                </div>
              </div>
              <div class="py-1">
                <p>Sala de Estar</p>
                <div>
                  <select class="bg-mybluepastel text-white p-2 mt-2 w-full bg-white_100 text-preto_500 input-text-filter" id="mod_camas" name="qtd_sala">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="mais">3+</option>
                  </select>
                </div>
              </div>

              <div class="py-1">
                <p>Banheiros</p>
                <div>
                  <select class="bg-mybluepastel text-white p-2 mt-1 w-full  input-text-filter" id="mod_banheiros" name="qtd_banheiros">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="mais">3+</option>
                  </select>
                </div>
              </div>
              <div class="py-1">
                <p>Garagem</p>
                <div>
                  <select class="p-2 mt-2 w-full bg-mybluepastel text-white input-text-filter" id="mod_garagem" name="qtd_garagem">
                    <option value="sim">Sim</option>
                    <option value="nao">Não</option>
                  </select>
                </div>
              </div>
              <div class="py-1">
                <p>Casa ou Apartamento</p>
                <div>
                  <select class="p-2 mt-2 w-full bg-mybluepastel text-white input-text-filter" id="mod_tipo_imovel" name="mod_tipo_imovel">
                    <option value="casa">Casa</option>
                    <option value="apartamento">Apartamento</option>
                  </select>
                </div>
              </div>
              <div class="flex justify-around">
                <div class="py-4 flex justify-between">
                  <a id="mod_filter_but" class="p-2 bg-mybluepastel text-white cursor-pointer w-full" style="width: 300px; max-width:96%; margin:auto;">
                    <input type="submit" value="Filtrar" class="font-bold text-center">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </form>
        <div class="flex justify-center">
          <h1 class="text-3xl text-center mb-4 mt-4 uppercase font-bold text-myblue"> Casas em Destaque</h1>
        </div>
        <div class="flex justify-center flex-wrap items-center gap-24 md:gap-24 lg:justify-around mx-auto md:flex-row lg:gap-8">
          <?php $args = ['post_type' => 'casa', 'posts_per_page' => 3];
          $query = new WP_Query($args);
          foreach ($query->posts as $post) { ?>
            <div class="estilo_casa_desc_home">
              <a href="<?php echo get_permalink() ?>">
                <div class="w-64">
                  <img class="h-full largura_imagem" src="<?php echo get_field('foto_principal', $post->ID)  ?>">
                  <p class="text-2xl mt-2"><?php echo get_field('cidade', $post->ID) ?></p>
                  <p class="text-md mt-2"> <span class="text-sm">Bairro:</span> <?php echo get_field('bairro', $post->ID) ?></p>
                  <p class="text-lg mt-2 gap-2 flex items-center"><span class="text-sm"><?php echo get_field('casa_ou_apo', $post->ID) ?>:</span><span class="text-2xl"><?php echo get_field('aluguel', $post->ID) ?></span></p>
                  <button class="w-full py-3 mt-2 bg-mybluepastel">
                    Ver mais
                  </button>
                </div>
              </a>
            </div>
          <?php }
          ?>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="w-full md:mt-6 md:mb-6 justify-center items-center flex bg-mymarrom max-w-5xl mx-auto element">
      <div class="max-w-5xl mx-auto  justify-center items-center pt-6 pb-6">
        <div class="md:flex gap-7  mx-3 flex-wrap sm:gap-3 flex justify-around">
          <div class="w-60 h-60 bg-myblue transition-all text-white ">
            <p class="flex justify-center "><i class="ph ph-pencil text-3xl"></i></p>
            <h2 class="flex text-center justify-center text-2xl">
              <?php echo get_field('_card_titulo_1', $post->ID); ?>
              Newsletter
            </h2>
            <hr class="w-2/4 mx-auto mt-3">
            <p class="flex justify-center text-sm text-center mt-8">
              <?php echo get_field('_card_texto_1'); ?>
              Assine nossa Newsletter e receba novidades
            </p>
            <button class="text-lg border mx-auto flex mt-10 px-8 popup-button text-white hover:bg-white hover:text-gray-600">Acessar</button>
          </div>
          <div class="w-60 h-60">
            <h2 class="flex text-center justify-center text-2xl">
              <img src="<?php echo get_template_directory_uri() . '/assets/imagens/casa.png'; ?>" alt="erro">
            </h2>
          </div>
          <div class="w-60 h-60  bg-myblue  transition-all text-white">
            <p class="flex justify-center "><i class="ph ph-handshake text-3xl"></i></p>
            <h2 class="flex text-center justify-center text-2xl">
              <?php echo get_field('_card_titulo_2') ?>
              Negocie seu imovel
            </h2>
            <hr class="w-2/4 mx-auto mt-3">
            <p class="mt-8 text-sm text-center">
              <?php echo get_field('_card_texto_2') ?>
              Negocie seu imovel com a gente
            </p>
            <button class="text-lg border mx-auto flex mt-6 px-8 mb-1 text-white hover:bg-white hover:text-gray-600">
              <a href="<?= home_url() . '/negocie-seu-imovel' ?>">Acessar </a>
            </button>
          </div>
        </div>
      </div>
      <div class="popup-overlay" id="popupOverlay">
        <div class="popup-content">
          <button id="closePopup"><i class="ph ph-x text-white text-2xl"></i></button>
          <form method="post">
            <div class="formulario_newsletter text-sm text-white">
              <input type="text" placeholder="Nome:" name="nome_newsletter" class="border px-1 py-3 mt-2 text-myblue">
              <input type="text" placeholder="Email:" name="email_newsletter" class="border px-1 py-3 mt-4 text-myblue">
              <select name="news_quarto" id="" class="bg-mybluepastel">
                <option value="quarto">Quantidade de Quartos</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <select name="news_garagem" id="" class="bg-mybluepastel">
                <option value="Garagem p/quantos carros">Garagem para quantos carros</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="2">3</option>
                <option value="sem garagem">sem garagem</option>

              </select>
              <select name="news_banheiro" id="" class="bg-mybluepastel">
                <option value="qtd_quartos">Quantidade de Banheiro</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
              <select name="news_tipo_imovel" id="" class="bg-mybluepastel">
                <option value="tipo">Tipo Imovel</option>
                <option value="casa">Casa</option>
                <option value="apartamento">Apartamento</option>
              </select>
            </div>
            <button class="mt-4 w-full text-2xl border py-2 px-6 bg-mybluepastel text-white hover:text-myblue hover:bg-white " type="submit" name="cad_newsleter">Enviar</button>
          </form>
        </div>
      </div>

    </div>

  </section>

  <section>
    <div class="bg-graypage pb-4" id="apartamento">
      <div class="max-w-4xl mx-auto mt-4">
        <div class="flex justify-center">
          <h1 class="text-3xl text-center mb-4 mt-4 text-myblue font-bold"> Apartamentos</h1>
        </div>
        <div class="flex justify-center flex-wrap items-center gap-24 md:gap-24 lg:justify-around lg:flex-nowrap mx-auto md:flex-row lg:gap-8 element">
          <?php $args = ['post_type' => 'apartamento', 'posts_per_page' => 3];
          $query = new WP_Query($args);
          foreach ($query->posts as $post) { ?>
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
            </div>
          <?php }
          ?>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="sm:flex flex-col md:mx-2 md:justify-around md:flex-row lg:max-w-5xl lg:mx-auto flex  text-center items-center gap-4 mt-0 element" id="quem-somos">
      <div class="w-4/5 mt-2 text-lg mb-16 md:w-2/4 md:mt-0">
        <h2 class="text-2xl mb-3 uppercase text-mymarrom font-bold ">Sobre a empresa</h2>
        <p class="text-left tex-md text-mymarrom font-bold">
          Fundada modestamente há duas décadas, a Imobiliária Primeiros Passos cresceu exponencialmente, tornando-se uma referência no mercado imobiliário. Nossa jornada começou com o compromisso de oferecer soluções personalizadas aos clientes, e hoje, orgulhamo-nos de ser uma imobiliária de destaque, dedicada a realizar sonhos e superar expectativas. Com uma equipe comprometida e uma trajetória de sucesso, continuamos a trilhar o caminho da excelência no setor imobiliário.
        </p>
      </div>
      <div class="w-4/5 mx-2 lg:w-2/5 lg:mx-0 first-letter flex flex-col mb-4 area-corretores" id="corretores">
        <h2 class="text-lg uppercase border-b-2 text-mymarrom text-md font-bold mt-2 ">Corretores</h2>
        <div class="bg-myblue text-white flex flex-col gap-3 h-80 overflow-y-scroll py-2 px-2 ">
          <div class="flex flex-col gap-2">
            <div class="corretores">
              <?php if (is_active_sidebar('sidebar-1')) : ?>
                <?php dynamic_sidebar('sidebar-1'); ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

<script>
  var animationDuration = 500;

  document.getElementById("modalTrigger").addEventListener("click", function() {
    var modal = document.getElementById("modal");
    var modalWidth = 320;

    if (modal.style.display === "none" || modal.style.display === "") {
      // Open the modal
      modal.style.display = "block";
      modal.style.animation = `modalOpen ${animationDuration}ms forwards`;
    } else {
      // Close the modal
      modal.style.animation = `modalClose ${animationDuration}ms forwards`;

      setTimeout(function() {
        modal.style.display = "none";
        modal.style.animation = "";
      }, animationDuration);
    }
  });
  const acessarButtons = document.querySelectorAll('.popup-button');
  const popupOverlay = document.getElementById('popupOverlay');
  const closePopupButton = document.getElementById('closePopup');

  function openPopup() {
    popupOverlay.style.display = 'flex';
  }

  function closePopup() {
    popupOverlay.style.display = 'none';
  }
  acessarButtons.forEach((button) => {
    button.addEventListener('click', openPopup);
  });
  closePopupButton.addEventListener('click', closePopup);
  popupOverlay.addEventListener('click', (event) => {
    if (event.target === popupOverlay) {
      closePopup();
    }
  });

  //most post
  // Função para verificar quando os elementos estão visíveis na janela de visualização
  function checkVisibility() {
    const elements = document.querySelectorAll('.element');

    elements.forEach(element => {
      const rect = element.getBoundingClientRect();
      const windowHeight = window.innerHeight;

      if (rect.top <= windowHeight * 0.75) {
        element.classList.add('visible');
      }
    });
  }

  // Execute a função quando a página carregar e quando houver scroll
  window.addEventListener('load', checkVisibility);
  window.addEventListener('scroll', checkVisibility);
</script>
<?php get_footer(); ?>
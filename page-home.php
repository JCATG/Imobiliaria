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
  /* Estilize os elementos ocultos */
.element {
  opacity: 0; /* Comece com a opacidade 0 para escondê-los */
  transform: translateY(20px); /* Mova-os para baixo */
  transition: opacity 0.5s, transform 2s; /* Adicione uma transição suave */
}

/* Adicione uma classe para mostrar os elementos quando visíveis na janela de visualização */
.element.visible {
  opacity: 1;
  transform: translateY(0);
}

  /* Ajustando largura das imagens do apo e casa na home */
  .largura_imagem{
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
    background: rgba(0, 0, 0, 0.7);
    z-index: 999;
    justify-content: center;
    align-items: center;
  }

  .popup-content {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    width: 300px;
    height: 300px;
    text-align: center;
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
    background-color: #FFFFFF;
    border-radius: 12px;
    box-shadow: 3px 3px 3px 3px gray;
  }
  /* Corretores */
  .corretores .widget-wrapper{
    margin-top: 12px;
  }
  .widget-wrapper figure img{
    border-radius: 100%;
  }
  @media only screen and (max-width:600px){
    .widget-wrapper figure img{
     width: unset;
    }
    .corretores .widget-wrapper .alignwide{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  }
</style>

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
  <div class="bg-gray-100">
    <div class="max-w-5xl mx-auto justify-center items-center pt-6 pb-6 element">
      <div class="flex justify-center">
        <h1 class="text-3xl text-center mb-4 mt-4 uppercase"> Casas em Destaque</h1>
      </div>
      <div class="flex justify-center flex-wrap items-center gap-24 md:gap-24 lg:justify-around mx-auto md:flex-row lg:gap-8">
        <?php $args = ['post_type' => 'casa', 'posts_per_page' => 3];
        $query = new WP_Query($args);
        foreach ($query->posts as $post) { ?>
          <div class="estilo_casa_desc_home">
            <a href="<?php echo get_permalink() ?>">
              <div class="w-64">
                <img class="h-full largura_imagem" src="<?php echo get_field('foto_principal', $post->ID)  ?>">
                <p class="text-2xl mt-2">Cidade: <?php echo get_field('cidade', $post->ID) ?></p>
                <p class="text-2xl mt-2">Bairro: <?php echo get_field('bairro', $post->ID) ?></p>
                <p class="text-2xl mt-2"><?php echo get_field('casa_ou_apo', $post->ID) ?>: R$<?php echo get_field('aluguel', $post->ID) ?></p>
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
    </div>
</section>

<section>
  <div class="w-full mt-6 mb-6 justify-center items-center flex bg-red-500 max-w-5xl mx-auto element">
    <div class="max-w-5xl mx-auto  justify-center items-center pt-6 pb-6">
      <div class="md:flex gap-7  mx-3 flex-wrap sm:gap-3 flex justify-around">
        <div class="w-60 h-60 bg-gray-700 hover:bg-gray-600 transition-all text-white ">
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
        <div class="w-60 h-60  bg-gray-700 hover:bg-gray-600 transition-all text-white">
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
        <button id="closePopup"><i class="ph ph-x text-black text-2xl"></i></button>
        <form method="post">
          <input type="text" placeholder="Nome:" name="nome_new" class="border px-1 py-3 mt-2">
          <input type="text" placeholder="Email:" name="email_new" class="border px-1 py-3 mt-4">
          <button class="mt-10 text-2xl border py-2 px-6 bg-red-500 text-white hover:bg-red-400" type="submit" name="cad_newsleter">Enviar</button>
        </form>
      </div>
    </div>

  </div>

</section>

<section>
  <div class="bg-gray-100 pb-4">
    <div class="max-w-4xl mx-auto mt-4">
      <div class="flex justify-center">
        <h1 class="text-3xl text-center mb-4 mt-4"> Apartamentos</h1>
      </div>
      <div class="flex justify-center flex-wrap items-center gap-24 md:gap-24 lg:justify-around lg:flex-nowrap mx-auto md:flex-row lg:gap-8 element">
        <?php $args = ['post_type' => 'apartamento', 'posts_per_page' => 3];
        $query = new WP_Query($args);
        foreach ($query->posts as $post) { ?>
          <div class="estilo_casa_desc_home">
            <a href="<?php echo get_permalink() ?>">
              <div class="w-64">
                <img class="h-full largura_imagem" src="<?php echo get_field('foto_principal', $post->ID)  ?>">
                <p class="text-2xl mt-2">Cidade: <?php echo get_field('cidade', $post->ID) ?></p>
                <p class="text-2xl mt-2">Bairro: <?php echo get_field('bairro', $post->ID) ?></p>
                <p class="text-2xl mt-2"> <?php echo get_field('casa_ou_apo', $post->ID) ?>: R$ <?php echo get_field('aluguel', $post->ID) ?></p>
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
    </div>
  </div>
</section>
<section>
  <div class="sm:flex flex-col md:justify-around md:flex-row lg:max-w-5xl mx-auto flex  text-center items-center gap-4 mt-0 element">
    <div class="w-4/5 mt-2 text-lg mb-16 md:w-2/4 md:mt-0">
      <h2 class="text-2xl mb-3 uppercase">Sobre a empresa</h2>
      <p class="text-left">
        <?php echo get_field('_texto_sobre_empresa') ?>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate aliquam temporibus cum rem quos?
         Mollitia quia architecto cum odio! Atque quas dicta velit, deserunt similique temporibus excepturi suscipit sit et?
      </p>
    </div>
    <div class="w-4/5 mx-2 lg:w-2/5 lg:mx-0 first-letter flex flex-col mb-4 area-corretores ">
      <h2 class="text-lg uppercase border-b-2 text-red-500 text-md ">Corretores</h2>
      <div class="bg-slate-600 text-white flex flex-col gap-3 h-80 overflow-y-scroll py-2 px-2 ">
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
<script>
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
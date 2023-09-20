<?php

/**
 *
 *  Template Name: Page Home
 *
 */

?>
<?php get_header(); ?>
<style>
  .imagem {
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/imagens/home.jpg');
    width: 100%;
    min-height: 700px;
    background-size: cover;
    position: relative;
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
    background-color: rgba(0, 0, 0, 0.8);
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
</style>

<section>
  <div class="imagem">
    <div class="flex items-center justify-center text-center h-screen">
      <h1 class="text-5xl text-white z-10 relative">Cada propriedade tem uma história. Deixe-nos ajudá-lo a encontrar a
        sua</h1>
    </div>
  </div>
</section>

<section>
  <!--CASAS EM DESTAQUE -->
  <div>
    <div class="max-w-5xl mx-auto justify-center items-center pt-6 pb-6">
      <div class="flex justify-center">
        <h1 class="text-3xl text-center mb-4 mt-4"> Casas em Destaque</h1>
      </div>
      <div class="flex justify-center flex-wrap items-center gap-24 md:gap-24 lg:justify-around mx-auto md:flex-row lg:gap-8">
        <div class="w-64 h-64">
          <img class="h-full" src="<?php echo get_template_directory_uri() . '/assets/imagens/casa1.jpg'; ?>" alt="erro">
          <p class="text-2xl mt-2">Vila Comerciarios</p>
          <div class="flex flex-wrap">
            <p>120 M /</p>
            <p>2 Quartos/</p>
            <p>1 Sala /</p>
            <p>1 Cozinha /</p>
            <p>2 Banheiro /</p>
            <p>1 Garagem /</p>
          </div>
        </div>
        <div class="w-64 h-64">
          <img class="h-full" src="<?php echo get_template_directory_uri() . '/assets/imagens/casa3.jpg'; ?>" alt="erro">
          <p class="text-2xl mt-2">Vila Comerciarios</p>
          <div class="flex flex-wrap">
            <p>120 M /</p>
            <p>2 Quartos/</p>
            <p>1 Sala /</p>
            <p>1 Cozinha /</p>
            <p>2 Banheiro /</p>
            <p>1 Garagem /</p>
          </div>
        </div>
        <div class="w-64 h-64">
          <img class="h-full" src="<?php echo get_template_directory_uri() . '/assets/imagens/casa2.jpg'; ?>" alt="erro">
          <p class="text-2xl mt-2">Vila Comerciarios</p>
          <div class="flex flex-wrap">
            <p>120 M /</p>
            <p>2 Quartos/</p>
            <p>1 Sala /</p>
            <p>1 Cozinha /</p>
            <p>2 Banheiro /</p>
            <p>1 Garagem /</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="w-full mt-40 justify-center items-center flex bg-red-500 max-w-5xl mx-auto">
    <div class="max-w-5xl mx-auto  justify-center items-center pt-6 pb-6">
      <div class="md:flex gap-7  mx-3 flex-wrap sm:gap-3 flex justify-around">
        <div class="w-60 h-60 bg-gray-700 hover:bg-gray-600 transition-all text-white">
          <p class="flex justify-center "><i class="ph ph-user-circle text-3xl"></i></p>
          <h2 class="flex text-center justify-center text-2xl">Area do Cliente</h2>
          <hr class="w-2/4 mx-auto mt-3">
          <p class="mt-8 text-sm text-center">Esta area é exclusiva para clientes</p>
          <button class="text-lg border mx-auto flex mt-10 px-8">Acessar</button>
        </div>
        <div class="w-60 h-60 bg-gray-700 hover:bg-gray-600 transition-all text-white ">
          <p class="flex justify-center "><i class="ph ph-pencil text-3xl"></i></p>
          <h2 class="flex text-center justify-center text-2xl">NEWSLETTER</h2>
          <hr class="w-2/4 mx-auto mt-3">
          <p class="flex justify-center mt-8">Acesse nossa Newsletter</p>
          <button class="text-lg border mx-auto flex mt-10 px-8 popup-button">Acessar</button>
        </div>
        <div class="w-60 h-60  bg-gray-700 hover:bg-gray-600 transition-all text-white">
          <p class="flex justify-center "><i class="ph ph-handshake text-3xl"></i></p>
          <h2 class="flex text-center justify-center text-2xl">Negocie seu Imovel</h2>
          <hr class="w-2/4 mx-auto mt-3">
          <p class="mt-8 text-sm text-center">Melhores Ofertas para negociar seu imovel</p>
            <button class="text-lg border mx-auto flex mt-6 px-8 mb-1">Acessar</button>
        </div>
      </div>
    </div>
    <div class="popup-overlay" id="popupOverlay">
      <div class="popup-content">
        <button id="closePopup"><i class="ph ph-x text-white text-2xl"></i></button>
        <form action="" method="post">
          <input type="text" placeholder="Nome:" class="border px-1 py-3 mt-2">
          <input type="text" placeholder="Email:" class="border px-1 py-3 mt-4">
          <button class="mt-10 text-2xl border py-2 px-6 bg-red-500 text-white hover:bg-red-400">Enviar</button>
        </form>
      </div>
    </div>

  </div>

</section>

<section>
  <div>
    <div class="max-w-4xl mx-auto">
      <div class="flex justify-center">
        <h1 class="text-3xl text-center mb-4 mt-4"> Apartamentos</h1>
      </div>

      <div class="flex justify-between mx-auto">
        <div class="w-64 h-64">
          <img class="h-full" src="<?php echo get_template_directory_uri() . '/assets/imagens/ap1.jpg'; ?>" alt="erro">
          <p class="text-2xl mt-2">Apartamento Chuva de Prata</p>
          <div class="flex flex-wrap">
            <p>120 M /</p>
            <p>2 Quartos/</p>
            <p>1 Sala /</p>
            <p>1 Cozinha /</p>
            <p>2 Banheiro /</p>
            <p>1 Garagem /</p>
          </div>
        </div>
        <div class="w-64 h-64">
          <img class="h-full" src="<?php echo get_template_directory_uri() . '/assets/imagens/ap2.jpg'; ?>" alt="erro">
          <p class="text-2xl mt-2">Apartamento Chuva de Prata</p>
          <div class="flex flex-wrap">
            <p>120 M /</p>
            <p>2 Quartos/</p>
            <p>1 Sala /</p>
            <p>1 Cozinha /</p>
            <p>2 Banheiro /</p>
            <p>1 Garagem /</p>
          </div>
        </div>
        <div class="w-64 h-64 ">
          <img class="h-full" src="<?php echo get_template_directory_uri() . '/assets/imagens/ap3.jpg'; ?>" alt="erro">
          <p class="text-2xl mt-2">Apartamento Chuva de Prata</p>
          <div class="flex flex-wrap">
            <p>120 M /</p>
            <p>2 Quartos/</p>
            <p>1 Sala /</p>
            <p>1 Cozinha /</p>
            <p>2 Banheiro /</p>
            <p>1 Garagem /</p>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<section>
  <div class="flex justify-around mx-auto max-w-5xl mt-32">

  </div>
</section>


<section>
  <div class="max-w-5xl mx-auto flex justify-between text-center items-center gap-4 my-16">
    <div class="w-3/4 text-lg">
      <h2 class="text-2xl mb-3">Sobre a empresa</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda,
        natus molestias. Consequatur ipsum harum, iste repudiandae dolor voluptates
        quidem asperiores accusantium, libero,
        quisquam consectetur quo quod explicabo molestiae cupiditate obcaecati?
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto exercitationem laboriosam deleniti, iure
        distinctio aliquid iste blanditiis modi soluta voluptatum fugit voluptatibus consectetur, quod porro, delectus
        laudantium impedit eos eaque?
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Exercitationem omnis, explicabo adipisci asperiores
        culpa porro quia iusto quidem maxime doloribus vero rem illum consequatur facilis fuga repudiandae repellat id
        cupiditate!
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum accusamus, corporis quia a sint repellat
        distinctio dignissimos enim laudantium. A ea unde tempora error eum, recusandae ipsa aliquid officia quia.

      </p>
    </div>
    <div class="w-1/4 flex flex-col mb-4">
      <h2 class="text-lg">Corretores</h2>
      <div class="flex flex-col gap-3 h-80 overflow-y-scroll">
        <div class="flex flex-col">
          <img class="h-full" src="<?php echo get_template_directory_uri() . '/assets/imagens/ap1.jpg'; ?>" alt="erro">
          <div class="flex flex-col">
            <p>Julio Cesar Alves</p>
            <a href="#">
              <p>Whatsaap</p>
            </a>
          </div>
        </div>
        <div>
          <img class="h-full" src="<?php echo get_template_directory_uri() . '/assets/imagens/ap1.jpg'; ?>" alt="erro">
        </div>
        <div>
          <img class="h-full" src="<?php echo get_template_directory_uri() . '/assets/imagens/ap1.jpg'; ?>" alt="erro">
        </div>
        <div>
          <img class="h-full" src="<?php echo get_template_directory_uri() . '/assets/imagens/ap1.jpg'; ?>" alt="erro">
        </div>
        <div>
          <img class="h-full" src="<?php echo get_template_directory_uri() . '/assets/imagens/ap1.jpg'; ?>" alt="erro">
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  // Get the Acessar buttons and popup elements
  const acessarButtons = document.querySelectorAll('.popup-button');
  const popupOverlay = document.getElementById('popupOverlay');
  const closePopupButton = document.getElementById('closePopup');

  // Function to open the popup
  function openPopup() {
    popupOverlay.style.display = 'flex'; // Display the popup
  }

  // Function to close the popup
  function closePopup() {
    popupOverlay.style.display = 'none'; // Hide the popup
  }

  // Add a click event listener to each Acessar button
  acessarButtons.forEach((button) => {
    button.addEventListener('click', openPopup);
  });

  // Add a click event listener to the close button
  closePopupButton.addEventListener('click', closePopup);

  // Close the popup if the user clicks outside of it
  popupOverlay.addEventListener('click', (event) => {
    if (event.target === popupOverlay) {
      closePopup();
    }
  });
</script>
<?php get_footer(); ?>
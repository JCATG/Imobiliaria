<?php

/**
 *
 *  Template Name: Page Dicas 
 *
 */

?>

<?php get_header(); ?>

<div class="max-w-5xl mx-auto">
    <div class="mb-4 w-full">
        <img src="<?php echo get_field('imagem_principal') ?>" alt="erro" class="w-full">
    </div>
    <div class="flex gap-2 flex-wrap mx-4 justify-center md:justify-normal md:flex-nowrap lg:mx-0">
        <div class="w-full md:w-3/5 flex flex-col gap-2 text-white">
            <div class="text-myblue py-4">
                <h2 class="text-2xl mb-2 uppercase font-bold">Vantagens e Desvantagens na hora de alugar um imovel</h2>
                <p><?php echo get_field('vantagem_desvantagem') ?></p>
            </div>
            <div class="py-4 text-myblue">
                <h2 class="text-2xl mb-2 uppercase font-bold">Cuidados que devo tomar na hora de alugar um imovel</h2>
                <p><?php echo get_field('cuidados') ?></p>
            </div>
            <div class="py-4 no-underline text-myblue">
                <h2 class="text-2xl mb-2 uppercase font-bold">Vantagens em alugar com uma imobiliaria</h2>
               <div class="flex flex-wrap">
               <?php echo get_field('vantagens_alug_imobili') ?>
               </div>
            </div>

        </div>
        <div class="w-full md:w-2/5">
            <div class="flex flex-col mx-2/4">
                <div class="mx-auto mb-4 md:mb-0">
                    <p class="mb-2 text-2xl uppercase font-bold text-myblue">Dicas na hora de alugar um Apartamento</p>
                    <iframe width="350" height="270" src="<?php echo get_field('video') ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

</div>




<?php get_footer(); ?>
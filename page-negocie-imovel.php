<?php

/**
 *
 *  Template Name: Page Negocie seu imovel
 *
 */

?>

<?php get_header(); ?>

<div class="w-full max-w-5xl mx-auto">
    <div class="lg:flex flex-wrap mt-16 gap-6">
        <p class="text-2xl">Informe abaixo suas Informações</p>
        <form action="" method="post">
            <input type="text" placeholder="Nome" class="w-3/5 border p-2">
            <input type="text" placeholder="Celular" class="border w-2/6 mt-2 p-2">
            <input type="text" placeholder="Email" class="w-3/5 border mt-2 p-2">
            <input type="text" placeholder="Cidade/Estado que reside" class="border w-2/6 p-2">


            <div class="mt-14">
                <p class="text-2xl mb-2">Informações do Imovel</p>
                    <select name="satinImovel" required="" class="p-3 text-md">
                        <option value="1" selected="">Apartamento</option>
                        <option value="2">Casa</option>
                        <option value="3">Chalé-Pousada</option>
                        <option value="4">Comercial</option>
                        <option value="5">Condomínio Fechado</option>
                        <option value="6">Escritório</option>
                        <option value="7">Fazenda</option>
                        <option value="8">Flat</option>
                        <option value="9">Galpão / Barracão</option>
                        <option value="10">Garagem</option>
                        <option value="11">Kitnet</option>
                        <option value="12">Loja</option>
                        <option value="13">Lote</option>
                        <option value="14">Mansão</option>
                        <option value="15">Pousada</option>
                        <option value="16">Quiosque</option>
                        <option value="17">Sala Comercial</option>
                        <option value="18">Sítio / Chácara</option>
                        <option value="19">Terreno</option>
                    </select>
                    <select name="finalidade" required="" class="p-3 text-md w-1/5">
                        <option value="2">Venda</option>
                        <option value="1">Locação</option>
                        <option value="3">Temporada</option>
                    </select>
                <input type="text" placeholder="Cidade/Estado do Imovel" class="w-3/5 border p-2">
                <textarea cols="30" rows="5" class="w-full border mt-2" placeholder="Descrição do imovel"></textarea>
            </div>
            <input type="submit" value="Enviar" class="mt-2 mb-5 text-2xl border py-2 px-6 bg-red-500 text-white hover:bg-red-400">
        </form>


    </div>
</div>
<?php get_footer(); ?>
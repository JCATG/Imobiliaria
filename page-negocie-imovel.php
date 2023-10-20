<?php

/**
 *
 *  Template Name: Page Negocie seu imovel
 *
 */

?>
<style>
    .image-preview img {
        min-width: 100px;
        min-width: 100px;
    }
</style>
<?php get_template_part('/inc/fomrulario/formulario-clientes.php') ?>

<?php $id = get_the_ID();  ?>
<?php get_header(); ?>

<div class="w-full max-w-5xl mx-auto">
    <div class="lg:flex flex-wrap mt-16 gap-6">
        <p class="text-2xl">Informe abaixo suas Informações</p>
        <?php
        if (isset($_SESSION['mensagem'])) {
            echo '<p class="message">' . $_SESSION['mensagem'] . '</p>';
            unset($_SESSION['mensagem']);
        }
        ?>
        <a name="form-anchor"></a>
        <form method="post">
            <input type="text" placeholder="Nome" class="w-3/5 border p-2" name="name">
            <input type="text" placeholder="Celular" class="border w-2/6 mt-2 p-2" name="form_cel">
            <input type="text" placeholder="Email" class="w-3/5 border mt-2 p-2" name="email">
            <input type="text" placeholder="Cidade/Estado que reside" class="border w-2/6 p-2" name="cidade">
            <div class="mt-14">
                <p class="text-2xl mb-2">Informações do Imovel</p>
                <select name="tipo_imovel" required class="p-3 text-md">
                    <option value="Apartamento">Apartamento</option>
                    <option value="Casa">Casa</option>
                </select>

                <select name="finalidade" required class="p-3 text-md w-1/5">
                    <option value="venda">Venda</option>
                    <option value="locação">Locação</option>
                    <option value="Temporada">Temporada</option>
                </select>
                <input type="text" placeholder="Cidade/Estado do Imovel" class="w-3/5 border p-2" name="cidade_imovel">
                <textarea cols="30" rows="5" class="w-full border mt-2" placeholder="Descrição do imovel" name="mensagem"></textarea>
                <p>Envie Fotos do seu imovel</p>
                <input type="file" name="file" class="text-sm bg-white text-black" />
                <div id="image-preview" class="flex flex-wrap "></div>
            </div>
            <input type="submit" value="Enviar" class="mt-2 mb-5 text-2xl border py-2 px-6 bg-red-500 text-white hover:bg-red-400" name="submit-form">
        </form>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Obtém a referência para o elemento de entrada de arquivo
        const fileInput = document.querySelector('input[type="file"]');

        // Obtém a referência para o elemento onde as miniaturas serão exibidas
        const imagePreview = document.getElementById("image-preview");

        // Adiciona um ouvinte de evento para o evento de alteração do arquivo
        fileInput.addEventListener("change", function() {
            // Loop através dos arquivos selecionados
            for (const file of fileInput.files) {
                // Cria um elemento de imagem para a miniatura
                const img = document.createElement("img");
                img.className = "thumbnail";
                img.src = URL.createObjectURL(file); // Define o src da imagem como a URL do arquivo selecionado
                img.alt = file.name; // Define o texto alternativo como o nome do arquivo

                // Adiciona a miniatura à div de visualização de imagem
                imagePreview.appendChild(img);
            }
        });
    });
</script>



<?php get_footer(); ?>
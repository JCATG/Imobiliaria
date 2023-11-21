<?php

/**
 *
 *  Template Name: Page Negocie seu imovel
 *
 */

?>
<style>
    #image-preview img {
        width: 100px !important;
        height: 100px !important;
        display: flex;
        flex-wrap: wrap;
        margin-top: 12px;
        gap: 12px;
    }
</style>
<?php get_template_part('/inc/fomrulario/formulario-clientes.php') ?>

<?php $id = get_the_ID();  ?>
<?php get_header(); ?>
<div class="bg-myblue">
    <div class="w-full max-w-5xl mx-auto">
        <div class="mx-3 flex-col flex lg:mx-0 lg:flex flex-wrap gap-6">
            <p class="text-2xl mt-4 uppercase font-bold text-white">Informe abaixo suas Informações</p>
            <?php
            if (isset($_SESSION['mensagem'])) {
                echo '<p class="message">' . $_SESSION['mensagem'] . '</p>';
                unset($_SESSION['mensagem']);
            }
            ?>
            <a name="form-anchor"></a>
            <form method="post" enctype="multipart/form-data">
                <div class="w-full md:w-full lg:mx-0">
                    <input type="text" placeholder="Nome" class="w-full md:w-3/5 border p-2" name="name">
                    <input type="text" placeholder="Celular" class="border w-full md:w-2/6 mt-2 p-2" name="form_cel">
                    <input type="text" placeholder="Email" class="w-full md:w-3/5 border mt-2 p-2" name="email">
                    <input type="text" placeholder="Cidade" class="border mt-2 w-full md:w-2/6 p-2 md:mt-0" name="cidade">
                </div>
                <div class="mt-14">
                    <p class="text-2xl mb-2 uppercase text-white font-bold">Informações do Imovel</p>
                    <div class="flex flex-col md:flex-row md:gap-3 text-gray-800">
                        <select name="tipo_imovel" required class="p-3 text-md">
                            <option value="Apartamento">Apartamento</option>
                            <option value="Casa">Casa</option>
                        </select>

                        <select name="finalidade" required class="w-full p-3 mt-2 text-md md:mt-0 md:w-1/5">
                            <option value="venda">Venda</option>
                            <option value="locação">Locação</option>
                            <option value="Temporada">Temporada</option>
                        </select>
                    </div>
                    <input type="text" placeholder="Cidade" class="w-full mt-2 md:w-full md:t-0 border p-2" name="cidade_imovel">
                    <textarea cols="30" rows="5" class="w-full border mt-2" placeholder="Descrição do imovel" name="mensagem"></textarea>
                    <p class="mt-2 text-white text-md">Envie Fotos do seu imovel</p>
                    <input type="file" name="file" class="text-sm bg-white text-black" />
                    <div id="image-preview" class="flex flex-wrap "></div>
                </div>
                <input type="submit" value="Enviar" class="mt-2 mb-5 text-2xl border py-2 px-6 bg-red-500 text-white hover:bg-red-400" name="submit-form">
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const fileInput = document.querySelector('input[type="file"]');
        const imagePreview = document.getElementById("image-preview");
        fileInput.addEventListener("change", function() {
            for (const file of fileInput.files) {
                const img = document.createElement("img");
                img.className = "thumbnail";
                img.src = URL.createObjectURL(file); // Define o src da imagem como a URL do arquivo selecionado
                img.alt = file.name; // Define o texto alternativo como o nome do arquivo
                imagePreview.appendChild(img);
            }
        });
    });
</script>



<?php get_footer(); ?>
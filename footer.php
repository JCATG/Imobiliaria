<style>
   /* Gradiente de cores semelhante ao Instagram Gradient */
   .instagran {
      /* Cor do Instagram */
      background: linear-gradient(45deg, #E4405F, #F77737, #BC2A8D);
   }
</style>
<footer>
   <div class="mx-auto max-w-5xl bg-gray-500">
      <div class="flex justify-between mx-4">
         <div class="flex flex-col mt-4 text-white">
            <?php wp_nav_menu(
               array(
                  'theme-location' => 'menu-footer'
               )
            )
            ?>

            <div class="flex gap-2 flex-wrap pt-4 pb-4">
               <div class="w-12 h-12 rounded-full bg-blue-500 flex items-center justify-center">
                  <i class="ph ph-facebook-logo text-2xl text-white"></i>
               </div>
               <div class="w-12 h-12 rounded-full instagran flex items-center justify-center">
                  <i class="ph ph-instagram-logo text-2xl text-white"></i>
               </div>
               <div class="w-12 h-12 rounded-full bg-blue-400 flex items-center justify-center">
                  <i class="ph ph-twitter-logo text-2xl text-white"></i>
               </div>
               <div class="w-12 h-12 rounded-full bg-red-600 flex items-center justify-center">
                  <i class="ph ph-youtube-logo text-2xl text-white"></i>
               </div>
            </div>
         </div>
         <div class="flex flex-col md:flex gap-6 md:flex-row mt-4 text-white w-1/5">
            <div class="md:flex flex-col">
               <p>Telefone</p>
               <p>Endereço</p>
               <p>Teste</p>
            </div>
            <div class="flex flex-col">
               <p>Telefone</p>
               <p>Endereço</p>
               <p>Teste</p>
            </div>
         </div>
      </div>
   </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>
<style>
   /* Gradiente de cores semelhante ao Instagram Gradient */
   .instagran {
      /* Cor do Instagram */
      background: linear-gradient(45deg, #E4405F, #F77737, #BC2A8D);
   }
</style>
<footer>
   <div class="mx-auto max-w-5xl bg-slate-800">
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
         <div class="flex flex-col md:flex gap-6 md:flex-row mt-4 text-white w-1/5 justify-around">
            <div class="mb-2">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3683.798477040679!2d-44.965092525682564!3d-22.58663932650592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9df431cc40bf4b%3A0xf03182ee08543a27!2sFaculdade%20de%20Tecnologia%20de%20Cruzeiro!5e0!3m2!1spt-BR!2sbr!4v1696044945438!5m2!1spt-BR!2sbr" width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>              
            </div>
         </div>
      </div>
   </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>
<footer>
  <div class="footer_widgets">
    <div class="row">
      <?php 
        if(is_active_sidebar('am_footersidebar')) {
          dynamic_sidebar('am_footersidebar');
        }
      ?>
    </div>
  </div>
  <div class="mainfooter">
    <div class="mainfooter_left">
      Todos os direitos reservados
    </div>
    <div class="mainfooter_right">
      Criado por Aw2Web @
    </div>
    <div class="mainfooter_scroll">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/seta-up.png" />
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
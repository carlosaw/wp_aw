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
      <?php if(get_theme_mod('am_privacy_url')): ?>
        <a href="<?php the_permalink( get_theme_mod('am_privacy_url') ); ?>">@Política de Privacidade</a>
      <?php endif; ?>
    </div>
    <div class="mainfooter_right">
      Criado por Aw2Web @
    </div>
    <div class="mainfooter_scroll">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/seta-up.png" />
    </div>
  </div>
</footer>

<!--Paginação com ajax-->
<script type="text/javascript">
  var ajaxUrl = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>

<?php wp_footer(); ?>
</body>
</html>
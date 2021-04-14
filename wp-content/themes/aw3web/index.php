<?php
get_header();
get_template_part('template_parts/banner-home');
?>

<div class="depoimentos">
  
  <div class="container">
    <div class="col-sm-6">
      <?php
        $d = rand(1,5);
        $txt = get_theme_mod('aa_depo'.$d.'_txt');
        $url = get_theme_mod('aa_depo'.$d.'_url');
        $autor = get_theme_mod('aa_depo'.$d.'_autor');
        $url = wp_get_attachment_image_src($url);
      ?>
      <img src="<?php echo $url[0]; ?>" />
              
          <i>"<?php echo $txt; ?>"</i><br/>
          <!--/*<?php echo(limit_words(get_the_excerpt(),10)); ?>*/-->
        
      <strong><?php echo $autor; ?></strong>
    </div>
  
    <div class="col-sm-6">
      <?php
        $d2 = rand(1,5);
        while($d2 == $d) {
          $d2 = rand(1,5);
        }
        $txt = get_theme_mod('aa_depo'.$d2.'_txt');
        $url = get_theme_mod('aa_depo'.$d2.'_url');
        $autor = get_theme_mod('aa_depo'.$d2.'_autor');
        $url = wp_get_attachment_image_src($url);
      ?>
      <img src="<?php echo $url[0]; ?>" />
        
          <i>"<?php echo $txt; ?>"</i><br/>
          <!--<?php echo(limit_words(get_the_excerpt(),10)); ?>-->

      <strong><?php echo $autor; ?></strong>
    </div>
  </div>
  
</div>

<section>
  <div class="container">
    <div class="postcontent">
      <?php if(have_posts()): ?>
        <?php while(have_posts()): ?>
          <?php the_post(); ?>

          <?php get_template_part('template_parts/post'); ?>

        <?php endwhile; ?>      
      <?php endif; ?>
    </div>
    <div class="loadmoreBtn">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/more.png" />
      Carregar mais
    </div> 

  </div>
</section>

<?php get_footer(); ?>

<style type="text/css">
  .depoimentos {   
  background-color: <?php echo get_theme_mod('aa_cordepoimentos'); ?>;
  }
  .post_button:hover {
  background-color: <?php echo get_theme_mod('aa_corbotaoHover'); ?>;
  }
  header {
    background-color: <?php echo get_theme_mod('aa_corheader'); ?>;
  }
  body {
    background-color: <?php echo get_theme_mod('aa_corbody'); ?>;
  }
  .footer_up {    
  background-color: <?php echo get_theme_mod('aa_corcursos'); ?>;
  }
  .footer_down {    
  background-color: <?php echo get_theme_mod('aa_corfooter'); ?>;
  }
</style>
<?php get_header(); ?>
<section>

  <div class="container">
    <div class="row">
      <div class="col-sm-8 maincontent">
        <?php if(have_posts()): ?>

          <div class="postscontent">
            <?php while(have_posts()): ?>
              <?php the_post(); ?>

              <?php get_template_part('template_parts/post'); ?>
            <?php endwhile; ?>
          </div>
          <!--
          <div class="paginacao">
            <div class="pagina_anterior"><?php previous_posts_link('&larr; Página Anterior'); ?></div>
            <div class="pagina_proxima"><?php next_posts_link('Próxima Página &rarr;'); ?></div>
            <div style="clear: both;"></div>
          </div>
         -->
          <div class="paginacao">
            <?php 
            
            ?>
            <!--<div class="loadmoreButton">Carregar Mais</div>-->
          </div>

          <!--
          <div class="paginacao2">
            <div class="pagina_anterior2"><?php previous_posts_link('&larr; Página Anterior'); ?></div>
            <div class="pagina_proxima2"><?php next_posts_link('Próxima Página &rarr;'); ?></div>
            <div style="clear: both;"></div>
          </div>-->  
          <div style="clear: both;"></div>
        <?php endif; ?>
      </div>
              
      <?php get_sidebar(); ?>
      
    </div>
  </div>

</section>

<?php get_footer(); ?>
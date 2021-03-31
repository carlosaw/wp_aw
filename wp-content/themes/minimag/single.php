<?php get_header(); ?>
<section>

  <div class="container">
    <div class="row">
      <div class="col-sm-8 maincontent">
        <?php if(have_posts()): ?>
          <?php while(have_posts()): ?>
            <?php the_post(); ?>
            
              <div class="post_title post_title_single"><?php the_title(); ?></div>
              <div class="post_content"><?php the_content(); ?></div>
          <?php endwhile; ?>

          <div class="paginacao">
            <?php add_filter ('the_title', 'max_title_length'); ?>
            <div class="pagina_anterior"><?php previous_post_link(); ?></div>
            <div class="pagina_proxima"><?php next_post_link(); ?></div>
            <div style="clear: both;"></div>
          </div>

          <div class="paginacao2">
            <?php add_filter ('the_title', 'max_title_length2'); ?>
            <div class="pagina_anterior2"><?php previous_post_link(); ?></div>
            <div class="pagina_proxima2"><?php next_post_link(); ?></div>
            <div style="clear: both;"></div>
          </div>

          <div class="comments_area">
            <?php if(comments_open()) {
              comments_template();
            }
            ?>
          </div>

        <?php endif; ?>
      </div>
              
      <?php get_sidebar(); ?>
      
    </div>
  </div>

</section>

<?php get_footer(); ?>
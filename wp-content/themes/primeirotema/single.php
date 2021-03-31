<?php get_header(); ?>

<section>
  <div class="container">
    <?php if(have_posts()): ?>
      <?php while(have_posts()): ?>
        <?php the_post(); ?>

        <article>
          
          <h2><?php the_title(); ?></h2>
            
          <?php if(has_post_thumbnail()): ?>            
            <?php the_post_thumbnail('thumbnail'); ?>
          <?php endif; ?>

          <p>
            <?php echo get_the_date(); ?> | 
              <a href="<?php echo get_author_posts_url(
                get_the_author_meta('ID') ) ?>"><?php
                the_author(); ?></a> |
            <?php the_category(', '); ?>
          </p>
            
          <p>
            <?php the_content(); ?>
          </p>

          <p>
            <?php comments_number('0 comentários', '1 comentário', '% comentários'); ?>
          </p>

          <hr/>

              <h3>Posts Relacionados</h3>

              <?php
              $categories = get_the_category() ;

              $ap_query = new WP_Query(array(
                'posts_per_page' => 3,
                'post__not_in' => array( $post->ID ),
                'cat' => $categories[0]->term_id
              ));
              if($ap_query->have_posts()) {
                while($ap_query->have_posts()) {
                  $ap_query->the_post();

                  get_template_part('template_parts/related_post');
                }
                wp_reset_postdata();
              }
              ?>
              <div style="clear: both;"></div>
          <hr/>

          <?php 
            if( comments_open() ) {
              comments_template();
            }
          ?>

        </article>

      <?php endwhile; ?>
    <?php endif; ?>

    <div class="paginacao">
      <div class="pagina_anterior"><?php previous_post_link(); ?></div>
      <div class="pagina_proxima"><?php next_post_link(); ?></div>
    </div>

  </div>

    <?php get_sidebar(); ?>

  <div style="clear: both;"></div>
</section>

<?php get_footer(); ?>
<article>
  <?php if(has_post_thumbnail()): ?>
    <a href="<?php the_permalink(); ?>" class="post_thumbnail">
      <?php the_post_thumbnail('medium', array(
        'class' => 'post_miniatura')); ?>              
    </a>
  <?php endif; ?>

  <h2><a href="<?php the_permalink(); ?>"><?php
    the_title(); ?></a></h2>
  
  <p>
    <?php echo get_the_date(); ?> |
      <a href="<?php echo get_author_posts_url(
        get_the_author_meta('ID') ); ?>">
      <?php the_author(); ?></a> |
    <?php the_category(', '); ?>          
  </p>
  <p>
    <?php the_excerpt(); ?>
  </p>

  <p>
    <?php comments_number('0 comentários', '1 comentário', '% comentários'); ?> |
    <a href="<?php the_permalink(); ?>">LEIA MAIS</a>
  </p>

</article>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header>
  <?php if(get_theme_mod('am_topmenu_show') == 'yes'): ?>
    <div class="top_header">
      <nav class="navbar navbar-default">
        <div class="container">

          <div class="navbar-header">
            <div class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </div>
          </div>

          <div class="collapse navbar-collapse" id="navbar">
            <?php
            if (has_nav_menu('top')) {
              wp_nav_menu(array(
                'theme_location' => 'top',
                'container' => false,
                'fallback_cb' => false,
                'menu_class' => 'nav navbar-nav'
              ));
            }
            ?>
          </div>
        </div>
      </nav>
    </div>
  <?php endif; ?>

    <div class="main_header">
      <div class="container">
        <div class="logo">
          <?php
          if (has_custom_logo()) {
            the_custom_logo();
          }
          ?>
        </div>

        <div class="main_nav_border">
          <div class="main_nav">
            <?php
            if (has_nav_menu('primary')) {
              wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'fallback_cb' => false,
                'menu_class' => 'nav navbar-nav'
              ));
            }
            ?>

            <div class="search_area">
            
              <?php
                if(get_theme_mod('am_search_show') == 'yes') {
                  get_search_form();
                }                
              ?>
            
            </div>
          </div>

          <div class="main_info">
            <div class="row">
              <div class="col-sm-8 randompost">
                <strong>Você já viu?</strong>
                <?php
                $am_query = new WP_Query(array(
                  'posts_per_page' => 1,
                  'post_type' => 'post',
                  'orderby' => 'rand'
                ));
                if ($am_query->have_posts()) {
                  while ($am_query->have_posts()) {
                    $am_query->the_post();
                ?>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php
                  }
                  wp_reset_postdata();
                }
                ?>
              </div>
              <div class="col-sm-4 socialarea">
                <div class="socialtxt">
                  SIGA:
                </div>
                <div class="socialicons">

                  <?php if (get_theme_mod('am_facebook')) : ?>
                    <a href="<?php echo get_theme_mod('am_facebook'); ?>" target="_blank">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png" />
                    </a>
                  <?php endif; ?>
                  
                  <?php if (get_theme_mod('am_googleplus')) : ?>
                    <a href="https://google.com" target="_blank">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gplus.png" />
                    </a>
                  <?php endif; ?>

                  <?php if (get_theme_mod('am_instagram')) : ?>
                  <a href="https://instagram.com" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.png" />
                  </a>
                  <?php endif; ?>

                  <?php if (get_theme_mod('am_twitter')): ?>
                    <a href="https://twitter.com" target="_blank">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter.png" />
                    </a>
                  <?php endif; ?>

                  <?php if (get_theme_mod('am_youtube')): ?>
                    <a href="https://youtube.com" target="_blank">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/youtube.png" />
                    </a>
                  <?php endif; ?>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  
  </header>
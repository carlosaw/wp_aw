<?php 
function am_theme_styles() {
  wp_enqueue_style('bootstrap_css', get_template_directory_uri().'/assets/css/bootstrap.min.css');
  wp_enqueue_style('template_css', get_template_directory_uri().'/assets/css/template.css');

  wp_enqueue_script('jquery_js', get_template_directory_uri().'/assets/js/jquery.js');
  wp_enqueue_script('bootstrap_js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), false, true);
  wp_enqueue_script('script_js', get_template_directory_uri().'/assets/js/script.js', array('jquery', 'bootstrap_js'), false, true);
}

function am_after_setup() {
  add_theme_support("post-thumbnails");
  add_theme_support("title-tag");
  add_theme_support("custom-logo");
  add_theme_support("post-formats", array('video', 'audio'));

  register_nav_menu("primary", "Menu Primário");
  register_nav_menu("top", "Menu Superior");
}
function am_widgets() {
  register_sidebar(array(
    'name' => 'Sidebar Lateral',
    'id' => 'am_sidebar',
    'description' => 'Sidebar Lateral',

    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' =>'</div>',

    'before_title' => '<h4 class="widget_title">',
    'after_title' => '</h4>'
  ));

  register_sidebar(array(
    'name' => 'Sidebar Rodapé',
    'id' => 'am_footersidebar',
    'description' => 'Sidebar Rodapé',

    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' =>'</div>',

    'before_title' => '<h4 class="widget_title">',
    'after_title' => '</h4>'
  ));

  function max_title_length( $title ) {
    $max = 30;
    if( strlen( $title ) > $max ) {
    return substr( $title, 0, $max ). " &hellip;";
    } else {
    return $title;
    }
  }
  function max_title_length2( $title ) {
    $max = 15;
    if( strlen( $title ) > $max ) {
    return substr( $title, 0, $max ). " &hellip;";
    } else {
    return $title;
    }
  }
  
  
 
  // Excerpt wpfoco para exibir os caracteres depois da quantidade de palavras
function excerpt( $limit ) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
      array_pop($excerpt);
      $excerpt = implode(" ",$excerpt).'...';
    } else {
     $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
  }
  function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
      array_pop($content);
    $content = implode(" ",$content).'...';
    } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
  }  
}
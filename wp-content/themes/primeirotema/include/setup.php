<?php 
function ap_theme_styles() {
  wp_enqueue_style('theme_css', get_template_directory_uri().'/assets/css/theme.css');

  wp_enqueue_script('theme_js', get_template_directory_uri().'/assets/js/script.js', array('jquery'), '', true);
}
// Ativar menus
function ap_after_setup() {
  //add_theme_support('menus');
  add_theme_support('post-thumbnails');

  add_theme_support('title-tag');

  add_theme_support('custom-logo');

  register_nav_menu('primary', __('Primary Menu', 'primeirotema'));
}

// Ativar Widgets
function ap_widgets() {
  register_sidebar(array(
    'name' => __('Meu primeiro sidebar', 'primeirotema'),
    'id' => 'ap_sidebar',
    'description' => __('Sidebar para o tema', 'primeirotema'),

    'before_title' => '<h4 class="widget_title">',
    'after_title' => '</h4>',

    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div id="%2$s">'
  ));
}
<?php 
require get_template_directory().'/include/customizer/social.php';
require get_template_directory().'/include/customizer/layout.php';

function am_customize_register( $wp_customize ) {

  $wp_customize->get_section('title_tagline')->title = 'Identidade do site Exemplo';
  $wp_customize->get_section('title_tagline')->description = 'Altere com cuidado!';
  $wp_customize->get_section('custom_css')->description = '';

  $wp_customize->add_panel('opcoes', array(
    'title' => 'Opções do Tema',
    'priority' => 1
  ));

  am_social_customizer( $wp_customize );

  am_layout_customizer( $wp_customize );

  /*
  echo '<pre>';
  print_r($wp_customize);
  echo '</pre>';
  */
}
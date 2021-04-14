<?php
require get_template_directory().'/include/customizer/social.php';
require get_template_directory().'/include/customizer/depoimentos.php';
require get_template_directory().'/include/customizer/cores.php';

function aa_customize_register( $wp_customize ) {

  aa_social_customizer($wp_customize);

  aa_depoimentos_customizer( $wp_customize);

  aa_cores_customizer( $wp_customize);
  
}
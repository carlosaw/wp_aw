<?php
function am_social_customizer( $wp_customize ) {
  // Settings
  $wp_customize->add_setting('am_facebook', array('default'=>''));
  $wp_customize->add_setting('am_googleplus', array('default'=>''));
  $wp_customize->add_setting('am_instagram', array('default'=>''));
  $wp_customize->add_setting('am_twitter', array('default'=>''));
  $wp_customize->add_setting('am_youtube', array('default'=>''));

  // Sections
  $wp_customize->add_section('am_social_section', array(
    'title' => 'Redes Sociais',
    'priority' => '1',
    'panel' => 'opcoes'
  ));

  // Controllers
  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'am_facebook',
      array(
        'label'=>'Link do Facebook',
        'section'=>'am_social_section',
        'settings'=>'am_facebook',
        'type'=>'text'
      )
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'am_googleplus',
      array(
        'label'=>'Link do Google Plus',
        'section'=>'am_social_section',
        'settings'=>'am_googleplus',
        'type'=>'text'
      )
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'am_instagram',
      array(
        'label'=>'Link do Instagram',
        'section'=>'am_social_section',
        'settings'=>'am_instagram',
        'type'=>'text'
      )
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'am_twitter',
      array(
        'label'=>'Link do Twitter',
        'section'=>'am_social_section',
        'settings'=>'am_twitter',
        'type'=>'text'
      )
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'am_youtube',
      array(
        'label'=>'Link do Youtube',
        'section'=>'am_social_section',
        'settings'=>'am_youtube',
        'type'=>'text'
      )
    )
  );
}
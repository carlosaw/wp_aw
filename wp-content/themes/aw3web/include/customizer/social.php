<?php
function aa_social_customizer( $wp_customize ) {
  // Settings
  $wp_customize->add_setting('aa_facebook', array('default' => ''));
  $wp_customize->add_setting('aa_youtube', array('default' => ''));
  $wp_customize->add_setting('aa_instagram', array('default' => ''));

  // Sections
  $wp_customize->add_section('aa_social_section', array(
    'title' => 'Redes Sociais',
    'priority' => '1'
  ));

  // Controllers
  $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        'aa_facebook',
        array(
          'label' => 'Link do Facebook',
          'section' => 'aa_social_section',
          'settings' => 'aa_facebook',
          'type' => 'text'
        )
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        'aa_youtube',
        array(
          'label' => 'Link do Youtube',
          'section' => 'aa_social_section',
          'settings' => 'aa_youtube',
          'type' => 'text'
        )
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        'aa_instagram',
        array(
          'label' => 'Link do Instagram',
          'section' => 'aa_social_section',
          'settings' => 'aa_instagram',
          'type' => 'text'
        )
      )
    );
}
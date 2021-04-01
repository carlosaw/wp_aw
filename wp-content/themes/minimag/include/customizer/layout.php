<?php
function am_layout_customizer( $wp_customize ) {
  // Settings
  $wp_customize->add_setting('am_topmenu_show', array('default' => 'yes'));
  $wp_customize->add_setting('am_search_show', array('default' => 'yes'));
  $wp_customize->add_setting('am_privacy_url', array('default' => ''));
    
  // Sections
  $wp_customize->add_section('am_layout_section', array(
    'title' => 'Opções de Layout',
    'priority' => 2,
    'panel' => 'opcoes'
  ));

  // Controllers
  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'am_topmenu_show',
      array(
        'label'=>'Mostrar Menu Superior',
        'section'=>'am_layout_section',
        'settings'=>'am_topmenu_show',
        'type'=>'checkbox', // text, checkbox, textarea, select, radio, dropdown-pages
        'choices' => array(
          'yes' => 'Sim'
        )
      )
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'am_search_show',
      array(
        'label'=>'Mostrar Busca',
        'section'=>'am_layout_section',
        'settings'=>'am_search_show',
        'type'=>'checkbox', // text, checkbox, textarea, select, radio, dropdown-pages
        'choices' => array(
          'yes' => 'Sim'
        )
      )
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'am_privacy_url',
      array(
        'label'=>'Página de Política de Privacidade',
        'section'=>'am_layout_section',
        'settings'=>'am_privacy_url',
        'type'=>'dropdown-pages', // text, checkbox, textarea, select, radio, dropdown-pages        
      )
    )
  );
}
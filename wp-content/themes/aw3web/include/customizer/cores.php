<?php
function aa_cores_customizer( $wp_customize ) {
  // Settings
  $wp_customize->add_setting('aa_corheader', array('default' => '#EEEEEE'));
  $wp_customize->add_setting('aa_corbody', array('default' => '#FFFFFF'));  

  $wp_customize->add_setting('aa_corbotao', array('default' => '#455482'));
  $wp_customize->add_setting('aa_corbotaoHover', array('default' => '#2e3d70'));

  $wp_customize->add_setting('aa_cortitulo', array('default' => '#2d3a64'));

  $wp_customize->add_setting('aa_cordepoimentos', array('default' => '#e3e3e3'));
  // Sections
  $wp_customize->add_section('aa_cores_section', array(
    'title' => 'Cores',
    'priority' => '2'
  ));
  $wp_customize->add_setting('aa_corcursos', array('default' => '#455482'));
  $wp_customize->add_setting('aa_corfooter', array('default' => '#2d3a64'));

  // Controllers
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'aa_corheader',
      array(
        'label' => 'Cor do Cabeçalho',
        'section' => 'aa_cores_section',
        'settings' => 'aa_corheader'
      )
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'aa_corbody',
      array(
        'label' => 'Cor do Corpo',
        'section' => 'aa_cores_section',
        'settings' => 'aa_corbody'
      )
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'aa_corbotao',
      array(
        'label' => 'Cor do botão',
        'section' => 'aa_cores_section',
        'settings' => 'aa_corbotao'
      )
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'aa_corbotaoHover',
      array(
        'label' => 'Ao passar o Mouse',
        'section' => 'aa_cores_section',
        'settings' => 'aa_corbotaoHover'
      )
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'aa_cortitulo',
      array(
        'label' => 'Cor do titulo',
        'section' => 'aa_cores_section',
        'settings' => 'aa_cortitulo'
      )
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'aa_cordepoimentos',
      array(
        'label' => 'Cor dos Depoimentos',
        'section' => 'aa_cores_section',
        'settings' => 'aa_cordepoimentos'
      )
    )
  );

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'aa_corcursos',
      array(
        'label' => 'Cor do Rodapé Superior',
        'section' => 'aa_cores_section',
        'settings' => 'aa_corcursos'
      )
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'aa_corfooter',
      array(
        'label' => 'Cor do Rodapé Inferior',
        'section' => 'aa_cores_section',
        'settings' => 'aa_corfooter'
      )
    )
  );

}
<?php
function ar_filter_receita_content( $content ) {

  if(!is_singular('receita')) {
    return $content;
  }

  global $post;

  $receita_html = wp_remote_get(
    plugins_url('includes/receita-template.php', RECEITA_PLUGIN_URL)
  );
  $receita_html = wp_remote_retrieve_body( $receita_html );

  //$receita_html = file_get_contents('receita-template.php', true);

  $origem = wp_get_post_terms( $post->ID, 'origem' );
  $t_url = '';
  if(isset($origem[0])) {
    $t_url = get_term_meta( $origem[0]->term_id, 'url', true );
  }

  $receita_data = get_post_meta($post->ID, 'receita_data', true);

  switch($receita_data['dificuldade']) {
    case '0':
      $receita_data['dificuldade'] = 'Iniciante';
      break;
    case '1':
      $receita_data['dificuldade'] = 'Intermediário';
      break;
    case '2':
      $receita_data['dificuldade'] = 'Avançado';
      break;
  }

  $receita_opts = get_option('ar_receita_opts');
  if(!is_user_logged_in() && $receita_opts['voto_login'] == 1) {
    $receita_html = str_replace('RECEITA_READONLY_PH', 'true', $receita_html);
  } else {
    $receita_html = str_replace('RECEITA_READONLY_PH', 'false', $receita_html);
  }

  $receita_html = str_replace('INGREDIENTES_PH', $receita_data['ingredientes'],     $receita_html);
  $receita_html = str_replace('TEMPO_PH', $receita_data['tempo'], $receita_html);
  $receita_html = str_replace('UTENSILIOS_PH', $receita_data['utensilios'], $receita_html);
  $receita_html = str_replace('DIFICULDADE_PH', $receita_data['dificuldade'], $receita_html);
  $receita_html = str_replace('TIPO_PH', $receita_data['tipo'], $receita_html);
  $receita_html = str_replace('RECEITA_ID_PH', $post->ID, $receita_html);
  $receita_html = str_replace('NOTA_PH', number_format($receita_data['media'], 1), $receita_html);
  $receita_html = str_replace('QT_PH', $receita_data['contagem'], $receita_html);

  if(isset($origem[0])) {
    $link = '<a href="'.$t_url.'" target="_blank">'.$origem[0]->name.'</a>';
    $receita_html = str_replace('ORIGEM_PH', $link, $receita_html);
  } else {
    $receita_html = str_replace('ORIGEM_PH', 'Nenhuma', $receita_html);
  }

  return $receita_html.$content;
}
<?php
function ar_receitas_submit() {
  $array = array('status' => 1);

  $receita_opts = get_option('ar_receita_opts');

  if(!is_user_logged_in() && $receita_opts['receita_login'] == 2) {
    wp_send_json($array);
    exit;
  }
    
  if(empty($_POST['ingredientes']) ||
    empty('tempo') ||
    empty('utensilios')||
    empty($_POST['dificuldade']) ||
    empty($_POST['tipo']) ) {

    wp_send_json($array);
  }

  $title = sanitize_text_field($_POST['title']);
  $content = wp_kses_post($_POST['content']);

  $receita_data = array(
    'ingredientes' => sanitize_text_field($_POST['ingredientes']),
    'tempo' => sanitize_text_field($_POST['tempo']),
    'utensilios' => sanitize_text_field($_POST['utensilios']),
    'dificuldade' => sanitize_text_field($_POST['dificuldade']),
    'tipo' => sanitize_text_field($_POST['tipo']),
    'media' => 0,
    'contagem' => 0
  );
  // Adiciona novo post de receita
  $post_id = wp_insert_post(array(
    'post_title' => $title,
    'post_name' => $title,
    'post_content' => $content,
    'post_status' => 'pending',
    'post_type' => 'receita'
  ));
  
  // Se enviou uma imagem ao criar receita
  if(!empty($_POST['anexo_id'])) {
    include_once(ABSPATH.'/wp-admin/includes/image.php');
    set_post_thumbnail($post_id, $_POST['anexo_id']);// Seta a miniatura do post
  }

  update_post_meta($post_id, 'receita_data', $receita_data);

  $array['status'] = 2;
  wp_send_json($array);

}
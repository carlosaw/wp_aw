<?php
function ar_voto_receita() {
  global $wpdb;

  $array = array(
    'status' => 0
  );
  // Verifica se está logado para votar
  $receita_opts = get_option('ar_receita_opts');
  if(!is_user_logged_in() && $receita_opts['voto_login'] == 2) {
    wp_send_json($array);
    exit;
  }

  // Receber dados que foram enviados
  $post_id = absint($_POST['id']);
  $voto = floatval($_POST['voto']);
  $ip = $_SERVER['REMOTE_ADDR'];// 127.0.0.1 ou ::1

  // Verifica se o ip já votou
  $sql = $wpdb->prepare("SELECT COUNT(*) FROM ".$wpdb->prefix."receitas_votos WHERE receita_id = %d AND user_ip = %s", $post_id, $ip);
  $qt = $wpdb->get_var($sql);
  // Se votou para por aqui.
  if($qt > 0) {
    wp_send_json($array);
  }
  // Se não votou Inserir os votos no banco de dados
  $wpdb->insert(
    $wpdb->prefix.'receitas_votos',
    array(
      'receita_id' => $post_id,
      'voto' => $voto,
      'user_ip' => $ip
    )
  );

  // Pegar a média das notas do post
  $receita_data = get_post_meta($post_id, 'receita_data', true);
  $receita_data['contagem']++;

  $sql = $wpdb->prepare("SELECT AVG(voto) FROM ".$wpdb->prefix."receitas_votos WHERE receita_id = %d", $post_id);
  $receita_data['media'] = $wpdb->get_var($sql);

  update_post_meta($post_id, 'receita_data', $receita_data);

  do_action('receita_voto', array(
    'post_id' => $post_id,
    'voto' => $voto
  ));

  // Retorna tudo ok
  $array['status'] = 1;

  wp_send_json($array);
}
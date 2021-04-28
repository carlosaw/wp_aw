<?php
function ar_receitas_criador_shortcode() {
  $receita_opts = get_option('ar_receita_opts');
  
  if(!is_user_logged_in() && $receita_opts['receita_login'] == 1) {
    return 'Você precisa estar logado para criar receitas!';
  }

  // Requisição externas e internas
  $criadorHTML = wp_remote_get(
    plugins_url('includes/shortcodes/receitas-criador-template.php', RECEITA_PLUGIN_URL)
  );
  $criadorHTML = wp_remote_retrieve_body( $criadorHTML );

  //$criadorHTML = file_get_contents('receitas-criador-template.php', true);

  ob_start();
  wp_editor('', 'receita_criador_editor');

  $editor = ob_get_clean();

  $criadorHTML = str_replace(
    '{EDITOR}',
    $editor,
    $criadorHTML
  );

  return $criadorHTML;
}
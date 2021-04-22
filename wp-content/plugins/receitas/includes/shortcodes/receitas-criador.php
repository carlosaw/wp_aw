<?php
function ar_receitas_criador_shortcode() {
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
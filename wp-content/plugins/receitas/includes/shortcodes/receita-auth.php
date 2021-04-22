<?php
function ar_receitas_auth_form_shortcode() {

  if(is_user_logged_in()) {
    return 'Você já está Logado!';
  }
  $formHTML = wp_remote_get(
    plugins_url('includes/shortcodes/receita-auth-template.php', RECEITA_PLUGIN_URL)
  );
  $formHTML = wp_remote_retrieve_body( $formHTML );

  //$formHTML = file_get_contents('receita-auth-template.php', true);

  $formHTML = str_replace(
    'SHOW_REG_FORM_PH',
    ( get_option('users_can_register') == '0' ) ? 'ar_hide_form' : '',
    $formHTML
  );

  return $formHTML;
}
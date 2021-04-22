<?php
function ar_activate_plugin() {
// Verificar a versão do Wordpress
  if( version_compare(get_bloginfo('version'), '5.7', '<') ) {
    wp_die(__('Você precisa atualizar o Wordpress para utilizar este plugin', 'receitas'));
  }

  ar_receitas_init();// Registra o postType
  flush_rewrite_rules();// Atualiza as regras no wordpress

  // Cria Tabela 'receita' no Banco de Dados
  global $wpdb;

  $sql = "CREATE TABLE ".$wpdb->prefix."receitas_votos (
    ID BIGINT(20) NOT NULL AUTO_INCREMENT,
    receita_id BIGINT(20) NOT NULL,
    voto TINYINT(1) NOT NULL,
    user_ip VARCHAR(32) NOT NULL,
    PRIMARY KEY (ID)
  ) ".$wpdb->get_charset_collate();

  require_once(ABSPATH.'/wp-admin/includes/upgrade.php');
  dbDelta( $sql );

  // hourly, daily, twicedaily -ativa o hook
  wp_schedule_event(time(), 'daily', 'ar_receita_diaria_hook');


  // Pega opções que estão gravadas em options
  $receitas_opts = get_option('ar_receita_opts');
    // Adiciona array no options se não tiver
  if(!$receitas_opts) {
    $opts = array(
      'voto_login' => 1,
      'receita_login' => 1
    );
    add_option('ar_receita_opts', $opts);
  }

}
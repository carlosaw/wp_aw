<?php
function ar_activate_plugin() {
// Verificar a versão do Wordpress
  if( version_compare(get_bloginfo('version'), '5.7', '<') ) {
    wp_die(__('Você precisa atualizar o Wordpress para utilizar este plugin', 'receitas'));
  }

}
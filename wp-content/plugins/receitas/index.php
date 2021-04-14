<?php 
/*
Plugin Name: Receitas
Description: Um plugin simples para adição e configuração de receitas.
Version: 1.0
Author: Aw2Web
Author URI: https://awregulagens.com.br
Text Domain: receitas
*/

if(!function_exists('add_action')) {
  echo __('Opa! Eu sou só um plugin, não posso ser chamado diretamente!', 'receitas');
  exit;
}

// Setup
define('RECEITA_PLUGIN_URL', __FILE__);

// Includes
include('includes/activate.php');
include('includes/init.php');
include('includes/admin/admin_init.php');

// Hooks
register_activation_hook(RECEITA_PLUGIN_URL, 'ar_activate_plugin');
add_action('init', 'ar_receitas_init');
add_action('admin_init', 'ar_receitas_admin_init');

// Shortcodes
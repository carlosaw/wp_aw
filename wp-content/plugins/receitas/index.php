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
include('includes/init.php');
include('includes/activate.php');
include('includes/admin/admin_init.php');
include('includes/filter-content.php');
include('includes/enqueue.php');
include('includes/voto-receita.php');
include(dirname(RECEITA_PLUGIN_URL).'/includes/widgets.php');
include('includes/widgets/receita_diaria.php');
include('includes/cron.php');
include('includes/deactivate.php');
include('includes/shortcodes/receitas-criador.php');
include('includes/shortcodes/receita-auth.php');
include('includes/receita-submit.php');
include('includes/receita-cadastro-submit.php');
include('includes/receita-login-submit.php');
include('includes/admin/dashboard-widgets.php');
include('includes/admin/menus.php');
include('includes/admin/receita_opts_page.php');
include('includes/admin/origem_fields.php');
include('includes/admin/origem_save.php');

// Hooks
register_activation_hook(RECEITA_PLUGIN_URL, 'ar_activate_plugin');
register_deactivation_hook(RECEITA_PLUGIN_URL, 'ar_deactivate_plugin');
add_action('init', 'ar_receitas_init');
add_action('admin_init', 'ar_receitas_admin_init');
add_action('save_post_receita', 'ar_save_post_admin', 10, 3);
add_filter('the_content', 'ar_filter_receita_content');
add_action('wp_enqueue_scripts', 'ar_enqueue_scripts', 100);
add_action('widgets_init', 'ar_widgets_init');
add_action('ar_receita_diaria_hook', 'ar_gerar_receita_diaria');
add_action('wp_dashboard_setup', 'ar_add_dashboard_widgets');
add_action('admin_menu', 'ar_admin_menus');
add_action('origem_add_form_fields', 'ar_origem_add_form_fields');
add_action('origem_edit_form_fields', 'ar_origem_edit_form_fields');
add_action('created_origem', 'ar_save_origem');
add_action('edited_origem', 'ar_save_origem');

// Ajax
add_action('wp_ajax_ar_voto_receita', 'ar_voto_receita');
add_action('wp_ajax_nopriv_ar_voto_receita', 'ar_voto_receita');
add_action('wp_ajax_ar_receitas_submit', 'ar_receitas_submit');
add_action('wp_ajax_nopriv_ar_receitas_submit', 'ar_receitas_submit');

add_action('wp_ajax_nopriv_ar_receita_criar_conta', 'ar_receita_criar_conta');
add_action('wp_ajax_nopriv_ar_receita_login', 'ar_receita_login');

// Shortcodes
add_shortcode('receitas_criador', 'ar_receitas_criador_shortcode');
add_shortcode('receitas_auth_form', 'ar_receitas_auth_form_shortcode');
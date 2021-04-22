<?php
function ar_admin_menus() {

  add_menu_page(
    'Opções de Receita',   // Titulo da Página
    'Config. de Receitas', // Titulo do Menu
    'edit_theme_options',  // Capability Responsável
    'ar_receita_opts',     // Slug da Página
    'ar_receita_opts_page' // Função de criação da Página
  );
}
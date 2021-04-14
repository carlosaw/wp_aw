<?php
function ar_receitas_init() {

  $labels = array (
    'name' => 'Receitas',
    'singular_name' => 'Receita',
    'menu_name' => 'Receitas',
    'name_admin_bar' => 'Receita',
    'add_new' => 'Adicionar Nova',
    'add_new_item' => 'Adicionar Nova Receita',
    'new_item' => 'Nova Receita',
    'edit_item' => 'Editar Receita',
    'view_item' => 'Visualizar Receita',
    'all_items' => 'Todas as Receitas',
    'search_items' => 'Procurar receita',
    'parent_item_colon' => 'Receitas Filhas:',
    'not_found' => 'Nenhuma receita encontrada',
    'not_found_in_trash' => 'Nenhuma receita na lixieira'
  );
  $array = array(
    'labels' => $labels,
    'description' => 'Um tipo de conteúdo para receitas.',
    'public' => true,
    'publicly_queryable' => true,
    'query_var' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'rewrite' => array('slug' => 'receita'),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title', 'editor', 'author', 'thumbnail', 'comments')
  );
  register_post_type('receita', $array);
}
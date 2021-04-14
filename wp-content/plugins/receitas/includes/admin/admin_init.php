<?php
include 'metabox_ar_receita_opcoes.php';
include 'enqueue.php';

function ar_receitas_admin_init() {
  add_action('add_meta_boxes_receita', 'ar_receitas_metaboxes');
  add_action('admin_enqueue_scripts', 'ar_admin_enqueue');
}

function ar_receitas_metaboxes() {

  add_meta_box(
    'ar_receita_opcoes',
    __('Opções da receita', 'receita'),
    'ar_receita_opcoes',
    'receita',
    'normal', // side, advanced
    'high' // high, default, low
  );
}
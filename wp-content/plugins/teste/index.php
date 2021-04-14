<?php
/*
Plugin Name: Teste para Hooks
*/

function at_title( $title ) {
  return '[A] '.$title;
}

function at_head() {
  echo "TEXTO QUALQUER 1<br/>";
}

function at_head2() {
  echo "TEXTO QUALQUER 2<br/>";
}

add_filter('the_title', 'at_title');
//apply_filters('at_algum', 'xyz');


add_action('wp_head', 'at_head', 1);
add_action('wp_head', 'at_head2', 2);
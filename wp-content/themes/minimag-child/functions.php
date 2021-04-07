<?php
function minimag_child_styles() {
  wp_enqueue_style('child-style', get_stylesheet_directory_uri().'/assets/css/child-style.css', array('template_css'));
}

add_action("wp_enqueue_scripts", 'minimag_child_styles');
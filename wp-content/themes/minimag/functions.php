<?php
// Include
require get_template_directory().'/include/setup.php';

// Hooks
add_action("wp_enqueue_scripts", "am_theme_styles");
add_action("after_setup_theme", "am_after_setup");
add_action("widgets_init", "am_widgets");
<?php
function ar_deactivate_plugin() {
  wp_clear_scheduled_hook('ar_receita_diaria_hook');
}
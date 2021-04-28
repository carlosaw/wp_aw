<?php
function ar_save_origem( $term_id ) {
  if(isset($_POST['ar_url'])) {
    update_term_meta( $term_id, 'url', esc_url_raw($_POST['ar_url']) );
  }
}
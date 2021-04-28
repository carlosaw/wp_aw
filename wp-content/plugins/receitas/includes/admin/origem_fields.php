<?php
function ar_origem_add_form_fields() {
  ?>
  <div class="form-field">
    <label>URL:</label>
    <input type="text" name="ar_url" />
    <p class="description">
      URL que o usuário pode clicar para saber mais.
    </p>
  </div>
  <?php
}

function ar_origem_edit_form_fields($term) {
  $url = get_term_meta($term->term_id, 'url', true);
  ?>
  <tr class="form-field">
    <th scope="row" valign="top">
      <label>URL</label>
    </th>
    <td>
      <input type="text" name="ar_url" value="<?php echo esc_attr($url); ?>" />
      <p class="description">
        URL que o usuário pode clicar para saber mais.
      </p>
    </td>
  </tr>
  <?php
}
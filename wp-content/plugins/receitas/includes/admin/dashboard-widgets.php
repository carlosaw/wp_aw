<?php
function ar_add_dashboard_widgets() {
  // Registra o Widget
  wp_add_dashboard_widget(
    'ar_receitas_ultimos_votos_widget',
    'Últimos Votos de Receitas',
    'ar_receitas_ultimos_votos_display'
  );

}

function ar_receitas_ultimos_votos_display() {

  global $wpdb;
  // Pega os últimos 5 votos
  $ultimos_votos = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."receitas_votos ORDER BY ID DESC LIMIT 5");

  // Monta a lista dos votos
  echo '<ul>';
  foreach($ultimos_votos as $voto) {
    $title = get_the_title( $voto->receita_id );
    $permalink = get_the_permalink( $voto->receita_id );
    $nota = $voto->voto;

    ?>
    <li>
      <a href="<?php echo $permalink; ?>"><?php echo $title; ?></a> recebeu um voto de <?php echo $nota; ?>
    </li>
    <?php
  }
  
  echo '</ul>';

}
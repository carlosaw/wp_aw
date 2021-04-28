<?php
function ar_receita_opcoes($post) {
  // Pega os dados do input Opções da receita
  $receita_data = get_post_meta($post->ID, 'receita_data', true);

    // Limpa os erros dos inputs e zera eles
  if(empty($receita_data)) {
    $receita_data = array(
      'ingredientes' => '',
      'tempo' => '',
      'utensilios' => '',
      'dificuldade' => '0',
      'tipo' => ''
    );
  }
  ?>
  
  Ingredientes:<br/>
  <input type="text" name="ar_ingredientes" value="<?php echo $receita_data['ingredientes']; ?>"/><br/><br/>

  Tempo da receita:<br/>
  <input type="text" name="ar_tempo" value="<?php echo $receita_data['tempo']; ?>" /><br/><br/>

  Utensílios:<br/>
  <input type="text" name="ar_utensilios" value="<?php echo $receita_data['utensilios']; ?>" /><br/><br/>

  Nível de dificuldade:<br/>
  <select name="ar_dificuldade">
    <option value="0" <?php echo($receita_data['dificuldade']=='0')?'
      selected="selected"':''; ?>>Iniciante</option>
    <option value="1" <?php echo($receita_data['dificuldade']=='1')?'
      selected="selected"':''; ?>>Intermediário</option>
    <option value="2" <?php echo($receita_data['dificuldade']=='2')?'
      selected="selected"':''; ?>>Avançado</option>
  </select><br/><br/>

  Tipo da receita:<br/>
  <input type="text" name="ar_tipo" value="<?php echo $receita_data['tipo']; ?>" />

  <?php
}
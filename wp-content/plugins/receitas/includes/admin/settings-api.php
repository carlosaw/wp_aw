<?php 
function settings_api() {

  register_setting('ar_opts_group', 'ar_receita_opts');

  add_settings_section(
    'receita_settings',// Identificador
    'Config das Receitas',// Título da section
    'ar_settings_section',// Função que vai ser rodada
    'ar_opts_section'// pg responsavel pela section
  );

  add_settings_field(
    'voto_login',
    'Usuário pode votar SEM estar logado?',
    'ar_voto_login_input',
    'ar_opts_section',
    'receita_settings'
  );
  add_settings_field(
    'receita_login',
    'Usuário pode adicionar receita SEM estar logado?',
    'ar_receita_login_input',
    'ar_opts_section',
    'receita_settings'
  );
}

function ar_settings_section() {
  echo "Texto Qualquer.";
}

function ar_voto_login_input() {
  $receita_opts = get_option('ar_receita_opts');
  ?>
  <select id="voto_login" name="ar_receita_opts[voto_login]">
    <option value="1" <?php echo ($receita_opts['voto_login'] == '1')?'selected="selected"':''; ?>>Não</option>
    <option value="2" <?php echo ($receita_opts['voto_login'] == '2')?'selected="selected"':''; ?>>Sim</option>
  </select>
  <?php
}

function ar_receita_login_input() {
  $receita_opts = get_option('ar_receita_opts');
  ?>
  <select id="receita_login" name="ar_receita_opts[receita_login]">
    <option value="1" <?php echo ($receita_opts['receita_login'] == '1')?'selected="selected"':''; ?>>Não</option>
    <option value="2" <?php echo ($receita_opts['receita_login'] == '2')?'selected="selected"':''; ?>>Sim</option>
  </select>
  <?php
}
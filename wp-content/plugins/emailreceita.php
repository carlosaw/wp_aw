<?php
/*
Plugin Name: Receita Email Voto
Description: Esse Plugin complementa o plugin Receitas
*/

function arev_receita_voto($array) {
  
  $post = get_post( $array['post_is'] );
  $email = get_the_author_meta('user_email', $post->post_author);

  $assunto = 'Você recebeu um novo voto na sua receita';
  $mensagem = 'Sua Receita '.$post->post_title.' recebeu um novo voto de '.$array['voto'].' estrelas';

  wp_mail($email, $assunto, $mensagem);

  echo "EMAIL RECEITA FUNCIONOU";
}

add_action('receita_voto', 'arev_receita_voto');
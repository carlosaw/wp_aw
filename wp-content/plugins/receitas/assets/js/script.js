jQuery(function(){
 // Enviar foto ao criar receita
  var mediauploader = wp.media({
    title:'Selecione ou envie uma Foto',
    button:{
      text:'Usar esta foto'
    },
    multiple:false // Só uma foto
  });
  // Ao clicar no botão enviar imagem
  jQuery('#receitas_img_upload_btn').on('click', function(e){
    e.preventDefault();

    mediauploader.open();// Abre o media uploader
  });

  // Quando enviar foto
  mediauploader.on('select', function(){
    var anexo = mediauploader.state().get('selection').first().toJSON();
    jQuery('#receitas_img_preview').attr('src', anexo.url);
    jQuery('#receitas_img').val(anexo.id);
  });

  jQuery('#receita_voto').bind('rated', function(){

    jQuery(this).rateit('readonly', true);

    var id = jQuery(this).data('id');
    var voto = jQuery(this).rateit('value');

    jQuery.ajax({
      type:'POST',
      url:receita_obj.ajax_url,
      data:{action:'ar_voto_receita', id:id, voto:voto},
        
        success:function(data){

        }
    });

  });
// Ao salvar no form de nova receita
  jQuery('#receitas_criador').on('submit', function(e){
    e.preventDefault();

    jQuery('#receitas_criador_submit').hide();

    jQuery('#receitas_criador_avisos').html('Carregando...');

    var form = {
      action:'ar_receitas_submit',
      title:jQuery('#receitas_title').val(),
      content:tinymce.activeEditor.getContent(),
      ingredientes:jQuery('#receitas_ingredientes').val(),
      tempo:jQuery('#receitas_tempo').val(),
      utensilios:jQuery('#receitas_utensilios').val(),
      dificuldade:jQuery('#receitas_dificuldade').val(),
      tipo:jQuery('#receitas_tipo').val(),
      anexo_id:jQuery('#receitas_img').val()
    };

    jQuery.ajax({
      type:'POST',
      url:receita_obj.ajax_url,
      data:form,
      dataType:'json',
      success:function(json){

        if(json.status == 2) {
          jQuery('#receitas_criador_avisos').html('Receita enviada com sucesso!');
          jQuery('#receitas_criador').hide();
        } else {
          jQuery('#receitas_criador_avisos').html('Não foi possível! Tente novamente mais tarde!');
          jQuery('#receitas_criador_submit').show();
        }

      }
    });

  });

  // Pega os dados do formulário de cadastro de usuário da receita.
  jQuery("#receita_cadastro").on('submit', function(e){
    e.preventDefault();

    jQuery('#receita_cadastro_aviso').html('Carregando...');
    jQuery('#cadastro_botao').hide();
    // Pega os dados do cadastro
    var form = {
      action:'ar_receita_criar_conta',
      name:jQuery('#cadastro_name').val(),
      email:jQuery('#cadastro_email').val(),
      senha:jQuery('#cadastro_senha').val()
    };
    jQuery.ajax({
      type:'POST',
      url:receita_obj.ajax_url,
      data:form,
      dataType:'json',
      success:function(json) {

        if(json.status == 2) {
          jQuery('#receita_cadastro_aviso').html('Conta criada com sucesso!');
          // Redireciona para home
          window.location.href = receita_obj.home_url;
        } else {
          jQuery('#receita_cadastro_aviso').html('Não foi possível criar sua conta!');
        }

      }
    });
  });

  // Requisição para Logar
  jQuery("#receita_login").on('submit', function(e){
    e.preventDefault();

    jQuery('#receita_login_aviso').html('Carregando...');
    jQuery('#login_botao').hide();
    // Pega os dados do cadastro
    var form = {
      action:'ar_receita_login',
      email:jQuery('#login_email').val(),
      senha:jQuery('#login_senha').val()
    };
    jQuery.ajax({
      type:'POST',
      url:receita_obj.ajax_url,
      data:form,
      dataType:'json',
      success:function(json) {

        if(json.status == 2) {
          jQuery('#receita_login_aviso').html('Logado com sucesso!');
          // Redireciona para home
          window.location.href = receita_obj.home_url;
        } else {
          jQuery('#receita_login_aviso').html('Não foi possível logar na conta!');
        }

      }
    });
  });

});
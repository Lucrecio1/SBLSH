$(document).ready(function(){

// VERIFICANDO OS CAMPOS DO FORMULÁRIO DO CONTACTOS
	$('form[name="form_contacto"]').on("submit",function(){
			var form = $(this);
        	var botao = form.find(':button');
			

			$.ajax({
				url: 'ajax/controles_externo.php',
				type:'POST',
				data: 'acao=cadastro&'+form.serialize(),
				beforeSend: function(){
					botao.attr('disabled', true);
				},
				success: function(retorno){
					botao.attr('disabled', false);

					if (retorno === "Cadastrou") {
						msg('Mensagem enviada com sucesso', 'sucesso');    
					}else if(retorno === "vazio"){
						msg('Campos obrigatórios em falta...', 'alerta');
					}else{
						msg('Não foi possível contactar-se a 2code', 'erro');
					}
				}
			});
		return false;
	});	

	    //FUNÇÃO DE MENSAGEM
    function msg(msg, tipo) {
        var retorno = $('.retorno');
        var tipo = (tipo === 'sucesso') ? 'success' : (tipo === 'alerta') ? 'warning' : (tipo === 'erro') ? 'danger' : (tipo === 'info') ? 'info' : alert('informe mensagem  de sucesso, alerta, erro, info');

        retorno.empty().fadeOut('fast', function() {
            return $(this).html('<div class="alert alert-' + tipo + '">' + msg + '</div>').fadeIn('slow');
        });

        setTimeout(function() {
            retorno.fadeOut('slow').empty();
        }, 7000);

    }


});
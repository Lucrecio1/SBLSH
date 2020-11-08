$(document).ready(function(){
	
// CRIANDO AS VARIAVEIS GLOBAIS
	var administrador = $('a#administrador');
	var conteudo = $('#modal-body_admin');
	var sintoma = $('a#sintoma');
	var hospital = $('a#hospital');
	var ver_admin = $('a.VerAdmin');
	var ver_sintoma = $('a.verSinto');
	var ver_doenca = $('a.Ver_Doe');
	var ver_hospital = $('a.verHosp');

    
// FIM DA CRIAÇÃO DAS VARIAVEIS GLOBAIS 

// ABRINDO O MODAL PARA O ADMIN
	administrador.click(function(){
		$.post('ajax/painel.php',{acao: 'form_cad'}, function(retorno){
			$('#modal_0_3').modal({backdrop: 'static'});
			conteudo.html(retorno);
		});
	});
//FIM

//ABRINDO O MODAL PARA OS SÍNTOMAS
	sintoma.click(function(){
		$.post('ajax/painel.php',{acao: 'form_cad_sintoma'}, function(retorno){
			$('#modal_0_3').modal({backdrop: 'static'});
			conteudo.html(retorno);
		});
	});
//FIM


//FIM

//ABRINDO O MODAL PARA OS HOSPITAIS
	hospital.click(function(){
		$.post('ajax/painel.php',{acao: 'form_cad_hospital'}, function(retorno){
			$('#modal_0_3').modal({backdrop: 'static'});
			conteudo.html(retorno);
		});
	});
//FIM

// VERIFICANDO OS CAMPOS DO FORMULÁRIO DO ADMIN
	$("#modal_0_3").on("submit",'form[name="form_cad"]',function(){
			var form = $(this);
        	var botao = form.find(':button');

			$.ajax({
				url: 'ajax/controles.php',
				type:'POST',
				data: 'acao=cadastro&'+form.serialize(),
				beforeSend: function(){
					botao.attr('disabled', true);
               	    $('.load').fadeIn('slow');
               	   
				},
				success: function(retorno){
					botao.attr('disabled', false);
               	    $('.load').fadeOut('slow');
               	    if (retorno === 'Cadastrou') {
               	   		form.fadeOut('slow', function(){
							listarDados('.tabela','ajax/painel.php', 'listarAdmin', true);
               	        	msg('Administrador Cadastrado com sucesso.', 'sucesso');   
								               	    		
               	    	});
               	    }else{
               	    	msg('Erro ao Cadastrar administrador.', 'erro');
               	    }
				}
			});
		return false;
	});	

// VERIFICANDO OS CAMPOS DO FORMULÁRIO DO SÍNTOMA
	$("#modal_0_3").on("submit",'form[name="form_cad_sintoma"]',function(){
			var form = $(this);
        	var botao = form.find(':button');

			$.ajax({
				url: 'ajax/controles.php',
				type:'POST',
				data: 'acao=cadastro_sintoma&'+form.serialize(),
				beforeSend: function(){
					botao.attr('disabled', true);
               	    $('.load').fadeIn('slow');
				},
				success: function(retorno){
					botao.attr('disabled', false);
               	    $('.load').fadeOut('slow');
               	   if (retorno === 'Cadastrou') {
               	   		form.fadeOut('slow', function(){
						listarDados('.tabela_sintoma','ajax/painel.php', 'listarSintoma',true);	
               	        msg('Síntoma Cadastrado com sucesso.', 'sucesso');                  	    		
               	    	});
               	    }else{
               	    	msg('Erro ao Cadastrar síntoma.', 'erro');
               	    }
				}
			});
		return false;
	});

// VERIFICANDO OS CAMPOS DO FORMULÁRIO DOENCA
	$("#").on("submit",'form[name="form_cad_doenca"]',function(){
			var form = $(this);
        	var botao = form.find(':button');

			$.ajax({
				url: 'ajax/controles.php',
				type:'POST',
				data: 'acao=cadastro_doenca&'+form.serialize(),
                cache: false,
                processData: false,
				beforeSend: function(){
					botao.attr('disabled', true);
               	    $('.load').fadeIn('slow');
				},
				success: function(retorno){
					botao.attr('disabled', false);
               	    $('.load').fadeOut('slow');
              		if (retorno === 'Cadastrou') {
               	   		form.fadeOut('slow', function(){
               	        	msg('Doença Cadastrada com sucesso.', 'sucesso');
							listarDados('.tabela_doenca','ajax/painel.php', 'listarDoenca',true);
               	    	});
               	    }else{
               	    	msg('Erro ao Cadastrar a Doença.', 'erro');
               	    }
				}
			});
		return false;
	});

// VERIFICANDO OS CAMPOS DO FORMULÁRIO HOSPITAIS
	$("#modal_0_3").on("submit",'form[name="form_cad_hospital"]',function(){
			var form = $(this);
        	var botao = form.find(':button');

			$.ajax({
				url: 'ajax/controles.php',
				type:'POST',
				data: 'acao=cadastro_hospital&'+form.serialize(),
				beforeSend: function(){
					botao.attr('disabled', true);
               	    $('.load').fadeIn('slow');
				},
				success: function(retorno){
					botao.attr('disabled', false);
               	    $('.load').fadeOut('slow');
              		if (retorno === 'Cadastrou') {
               	   		form.fadeOut('slow', function(){
               	        	msg('Hospital Cadastrada com sucesso.', 'sucesso');   
							listarDados('.tabela_hospiatl','ajax/painel.php', 'listarHospital',true);								    	               	    		
               	    	});
               	    }else{
               	    	msg('Erro ao Cadastrar o Hospital.', 'erro');
               	    }
				}
			});
		return false;
	});	

// ÁREA DA ACTUALIZAÇÃO DOS DADOS
	//BOTÃO EDIT ADMIN
		$('.tabela').on("click",'#btn_edit', function(){
				var id = $(this).attr('data-id');
				$.post('ajax/painel.php',{acao: 'form_edit', id: id},function(retorno){
					$('#modal_0_3').modal({backdrop: 'static'});
					conteudo.html(retorno);
				});
				return false;
		});
		$('#modal_0_3').on("submit", 'form[name="form_edit"]',function(){
			var dados = $(this);
        	var botao = dados.find(':button');

			$.ajax({

				url: 'ajax/controles.php',
				type:'POST',
				data: 'acao=edit&'+dados.serialize(),
				beforeSend: function(){
					botao.attr('disabled', true);
               	    $('.load').fadeIn('slow');
				},

				success: function(retorno){		
               	    if (retorno === 'atualizou') {
               	   		dados.fadeOut('slow', function(){
						listarDados('.tabela','ajax/painel.php', 'listarAdmin',true);
               	        msg('Administrador Editado com sucesso.', 'sucesso');   
               	    	});
               	    } else{
               	        	msg('Não houve nenhuma alteração feita.', 'alerta');
               	  			 $('.load').fadeOut('slow',function(){
               	        		botao.attr('disabled', false);
               	  			 });
               	    }
				}
			});
			return false;
		});
	//BOTÃO EDIT_DOENÇA
		$('.tabela_doenca').on("click",'#btn_edit', function(){
				var id = $(this).attr('data-id');
				$.post('ajax/painel.php',{acao: 'form_edit_doenca', id: id},function(retorno){
					$('#modal_0_3').modal({backdrop: 'static'});
					conteudo.html(retorno);
				});
				return false;
		});

		$('#modal_0_3').on("submit", 'form[name="form_edit_doenca"]',function(){
			var dados = $(this);
        	var botao = dados.find(':button');

			$.ajax({

				url: 'ajax/controles.php',
				type:'POST',
				data: 'acao=edit_doenca&'+dados.serialize(),
				beforeSend: function(){
					botao.attr('disabled', true);
               	    $('.load').fadeIn('slow');
				},

				success: function(retorno){
               	    if (retorno === 'atualizou') {
               	   		dados.fadeOut('slow', function(){
						listarDados('.tabela_doenca','ajax/painel.php', 'listarDoenca',true);
               	        msg('Doença Editado com sucesso.', 'sucesso');
               	    	});
               	    } else{
               	        	msg('Não houve nenhuma alteração feita.', 'alerta');
               	  			 $('.load').fadeOut('slow',function(){
               	        		botao.attr('disabled', false);
               	  			 });
               	    }
				}
			});
			return false;
		});
		//BOTÃO EDIT_SÍNTOMA
		$('.tabela_sintoma').on("click",'#btn_edit', function(){
				var id = $(this).attr('data-id');
				$.post('ajax/painel.php',{acao: 'form_edit_sintoma', id: id},function(retorno){
					$('#modal_0_3').modal({backdrop: 'static'});
					conteudo.html(retorno);
				});
				return false;
		});

		$('#modal_0_3').on("submit", 'form[name="form_edit_sintoma"]',function(){
			var dados = $(this);
        	var botao = dados.find(':button');

			$.ajax({
				url: 'ajax/controles.php',
				type:'POST',
				data: 'acao=edit_sintoma&'+dados.serialize(),
				beforeSend: function(){
					botao.attr('disabled', true);
               	    $('.load').fadeIn('slow');
				},

				success: function(retorno){	
					console.log(retorno)
               	    if (retorno === 'atualizou') {
               	   		dados.fadeOut('slow', function(){
               	        msg('Síntoma Editado com sucesso.', 'sucesso');
						listarDados('.tabela_sintoma','ajax/painel.php', 'listarSintoma',true);	    
               	    	});
               	    } else{
               	        	msg('Não houve nenhuma alteração feita.', 'alerta');
               	  			 $('.load').fadeOut('slow',function(){
               	        		botao.attr('disabled', false);
               	  			 });
               	    }
				}
			});
			return false;
		});
		//BOTÃO EDIT_HOSPITAIS
		$('.tabela_hospital').on("click",'#btn_edit', function(){
				var id = $(this).attr('data-id');
				$.post('ajax/painel.php',{acao: 'form_edit_hospital', id: id},function(retorno){
					$('#modal_0_3').modal({backdrop: 'static'});
					conteudo.html(retorno);
				});
				return false;
		});

		$('#modal_0_3').on("submit", 'form[name="form_edit_hospital"]',function(){
			var dados = $(this);
        	var botao = dados.find(':button');

			$.ajax({
				url: 'ajax/controles.php',
				type:'POST',
				data: 'acao=edit_hospital&'+dados.serialize(),
				beforeSend: function(){
					botao.attr('disabled', true);
               	    $('.load').fadeIn('slow');
				},

				success: function(retorno){	
					console.log(retorno)
               	    if (retorno === 'atualizou') {
               	   		dados.fadeOut('slow', function(){
               	        msg('Hospital Editado com sucesso.', 'sucesso');
						listarDados('.tabela_hospital','ajax/painel.php', 'listarhospital',true);

               	    	});
               	    } else{
               	        	msg('Erro ao editar Hospital.', 'erro');
               	  			 $('.load').fadeOut('slow',function(){
               	        		botao.attr('disabled', false);
               	  			 });
               	    }
				}
			});
			return false;
		});
// FIM DA ACTUALIZAÇÃO

// ÁREA DA EXCLUSÃO
	// BOTÃO EXCLUIR ADMIN 
	$('.tabela').on("click",'#btn_excluir', function(){
        var id = $(this).attr('data-id');
        $('#modal_1_10').modal({backdrop: 'static'});
        $('.textoelim').text('Você deseja realmente excluir este administrador?.');
         $('#confirm').click(function () {
             $.post('ajax/controles.php', {acao: 'excluir', id: id}, function (retorno) {
                 if (retorno === 'deletou') {
                     listarDados('.tabela', 'ajax/painel.php', 'listarAdmin', true);
                 }
             });
             smsbd('Administrador eliminado com sucesso.', 'sucesso');
         });
	});

//FIM
	// BOTÃO EXCLUIR DOENÇA 
		$('.tabela_doenca').on("click",'#btn_excluir', function(){
        var id = $(this).attr('data-id');
        $('#modal_1_10').modal({backdrop: 'static'});
        $('.textoelim').text('Você deseja realmente excluir esta Doença?.');
         $('#confirm').click(function () {
             $.post('ajax/controles.php', {acao: 'excluir_doenca', id: id}, function (retorno) {
                 if (retorno === 'deletou') {
                     listarDados('.tabela_doenca', 'ajax/painel.php', 'listarDoenca', true);
                 }
             });
             smsbd('Doença eliminada com sucesso.', 'sucesso');
         });
	});
		// BOTÃO EXCLUIR SÍNTOMA
    $('.tabela_sintoma').on("click",'#btn_excluir', function(){
        var id = $(this).attr('data-id');
        $('#modal_1_10').modal({backdrop: 'static'});
        $('.textoelim').text('Você deseja realmente excluir este Sintoma?.');
        $('#confirm').click(function () {
            $.post('ajax/controles.php', {acao: 'excluir_sintoma', id: id}, function (retorno) {
                if (retorno === 'deletou') {
                    listarDados('.tabela_sintoma', 'ajax/painel.php', 'listarSintoma', true);
                }
            });
            smsbd('Sintoma eliminada com sucesso.', 'sucesso');
        });
    });
		
// estavamos aqui

$('.tabela_selecionar').on("click",'#rdo', function(){
    $Sintoma = $(this).attr('data-id');
           $.post('relat.php', {acao: 'Nova_Busca', id: $Sintoma}, function(retorno){
                  //$('.ativador').text('Agurade: Procesando Resultado do Diagnostico').delay(3000);
            $.getJSON("http://localhost/SBLSH_/relat.php/Nova_Busca/" + $Sintoma, function(resposta) {
                $.getJSON("http://localhost/SBLSH_/relat.php/Nova_BuscaINFO/" + $Sintoma, function(Ifo) {
                $.getJSON("http://localhost/SBLSH_/relat.php/Nova_BuscaSOCORRO/" + $Sintoma, function(Socorros) {
                if(resposta=="nao_achou"){
                    smsbd('Estes sintomas não correspondem a nenhuma doença do SBLSH.', 'erro');
                }
                else {
                    var dado = JSON.stringify(ret(resposta));
                    var dadoINFO = JSON.stringify(ret(Ifo));
                    var socorro = JSON.stringify(ret(Socorros).replace('"', ' ').replace('"', ' '));


                    $("#Resultado").show(2000);
                    $("#sitle").show().text('Resultado dos sintomas');
                    $('.sinselect').text('> sintoma selecionado: ' +  $Sintoma);
                    $('.result').text(dado.replace('"','').replace('"',''));
                    $('.InfoDoe').text(' ' +dadoINFO.replace('"', ' ').replace('"', ' ').replace('::',''));
                    $("#btnvoltar").show(2000);
                    $('#sintomas').hide();
                    $('.componrtes').hide();


                    var list = document.querySelector(".output ul");
                    list.innerHTML ="";
                    var myData = JSON.stringify(ret(Socorros));
                    var myArray = myData.split(',');
                    console.log(myArray);


                    for (var i = 0; i < myArray.length; i++) {
                        var input = myArray[i];
                        // Seu teste condicional precisa ir dentro dos parênteses
                        // na linha abaixo, substituindo o que está lá
                        if (myArray[i]) {
                            var result = input.replace('"','').replace('"','');
                            var listItem = document.createElement("li");
                            listItem.textContent = result;
                            list.appendChild(listItem);
                        }
                    }
                }
               });
              });
            });
      });
           
            $("#VerRESULT").click(function(event) {
                event.preventDefault();
                $(".infodasdoencas").fadeIn(2000);
                $("#diagn").text('Diagnostico').css('color','black');
                $("#versocorro").show();
                $("#VerRESULT").hide();
                $("#psocorros").fadeOut();

            });
           $("#versocorro").click(function(event) {
                event.preventDefault();
                $("#psocorros").fadeIn(2000);
                $('#VerRESULT').show();
                $("#versocorro").hide();
                $("#diagn").text( 'Primeiros Socorro?').css('color','red');
                $(".infodasdoencas").hide();

            });
            $("#prevencao").click(function(event) {
                event.preventDefault();
                $("#psocorros").fadeIn(2000);
                $('#VerRESULT').show();
                $("#versocorro").hide();
                $("#diagn").text( 'Como se prevenir?').css('color','red');
                $(".infodasdoencas").hide();
            });
            $("#causas").click(function(event) {
                event.preventDefault();
                $("#psocorros").fadeIn(2000);
                $('#VerRESULT').show();
                $("#versocorro").hide();
                //$("#prevencao").hide();
                $("#diagn").text( 'Causas?').css('color','red');
                $(".infodasdoencas").hide();
            });

            $("#btnvoltar").click(function(event) {
                event.preventDefault();
                $("#sintomas").fadeIn();
                $("#sitle").text('sintomas');
                $('.componrtes').fadeIn();
                $("#Resultado").hide();
                $("#btnvoltar").hide();
                $("#sitle").hide();
            });
  });
    function ret(param){
        var  valor= [];
        $.each(param, function(key,val){
            valor.push(val);
        })
        return valor[0];
    }

	// BOTÃO EXCLUIR HOSPITAL
    $('.tabela_hospital').on("click",'#btn_excluir', function(){
        var id = $(this).attr('data-id');
        $('#modal_1_10').modal({backdrop: 'static'});
        $('.textoelim').text('Você deseja realmente excluir este Hospital?.');
        $('#confirm').click(function () {
            $.post('ajax/controles.php', {acao: 'excluir_hospital', id: id}, function (retorno) {
                if (retorno === 'deletou') {
                    listarDados('.tabela_hospital', 'ajax/painel.php', 'listarhospital', true);
                }
            });
            smsbd('Hospital eliminada com sucesso.', 'sucesso');
        });
    });
		// BOTÃO EXCLUIR HOSPITAL
	$('.tabela_notificacao').on("click",'#btn_excluir', function(){
        var id = $(this).attr('data-id');
        $('#modal_1_10').modal({backdrop: 'static'});
        $('.textoelim').text('Você deseja realmente excluir esta mensagem do Sistema?.');
        $('#confirm').click(function () {
            $.post('ajax/controles.php', {acao: 'excluir_notificacao', id: id}, function (retorno) {
                if (retorno === 'deletou') {
                    listarDados('.tabela_notificacao', 'ajax/painel.php', 'listarNotificacao', true);
                }
            });
            smsbd('Mensagem eliminada do sistema com sucesso.', 'sucesso');
        });
    });
//FIM DA EXCLUSÃO

// FUNÇÕES GERAIS
	// FUNÇÃO LISTAR [chamando a tabela e enviando para o painel]
	    function listarDados(tabela,url,acao,atualiza){
	    	$.post(url, {acao: acao}, function(retorno){
	    		var tbody = $(tabela).find('tbody');
	    		var load = tbody.find('.load');

	    		if (atualiza === true) {
	    			tbody.html(retorno);
	    		}else{
	    		load.fadeOut(3000,function(){
	    			tbody.html(retorno);
	    		});
	    	}
	    	});
	    }

	    ver_admin.click(function(){
			listarDados('.tabela_ver','ajax/painel.php', 'listarAdmin_');
	    });
 		ver_sintoma.click(function(){
			listarDados('.tabela_sintoma_ver','ajax/painel.php', 'listarSintoma_');
	    });
 		 ver_doenca.click(function(){
			listarDados('.tabela_doenca_ver','ajax/painel.php', 'listarDoenca_');
	    });
 		ver_hospital.click(function(){
			listarDados('.tabela_hospital_ver','ajax/painel.php', 'listarhospital_');
	    });
		listarDados('.tabela','ajax/painel.php', 'listarAdmin');
		listarDados('.tabela_doenca','ajax/painel.php', 'listarDoenca');
    	listarDados('.tabela_sintoma','ajax/painel.php', 'listarSintoma');
		listarDados('.tabela_hospital','ajax/painel.php', 'listarhospital');
		listarDados('.tabela_notificacao','ajax/painel.php', 'listarNotificacao');
    	//listarDados('.tabela_selecionar','ajax/painel.php', 'fora');
	//FIM FUNÇÃO LISTAR
		    
	    //FUNÇÃO DE MENSAGEM
    function msg(msg, tipo) {
        var retorno = $('.retorno');
        var tipo = (tipo === 'sucesso') ? 'success' : (tipo === 'alerta') ? 'warning' : (tipo === 'erro') ? 'danger' : (tipo === 'info') ? 'info' : alert('informe mensagem  de sucesso, alerta, erro, info');

        retorno.empty().fadeOut('fast', function() {
            return $(this).html('<div class="alert alert-' + tipo + '">' + msg + '</div>').fadeIn('slow');
        });

        setTimeout(function() {
            retorno.fadeOut('slow').empty();
        }, 4000);

    }
// FIM DAS FUNÇÕES GERAIS
    
    //FUNÇÃO DE MENSAGEM de eliminacao da bd
    function smsbd(smsbd, tipo) {
        var elretorno = $('.elretorno');
        var tipo = (tipo === 'sucesso') ? 'success' : (tipo === 'alerta') ? 'warning' : (tipo === 'erro') ? 'danger' : (tipo === 'info') ? 'info' : alert('informe mensagem  de sucesso, alerta, erro, info');

        elretorno.empty().fadeOut('fast', function() {
            return $(this).html('<div class="alert alert-' + tipo + '">' +smsbd + '</div>').fadeIn('slow');
        });

        setTimeout(function() {
            elretorno.fadeOut('slow').empty();
        }, 4000);

    }
// FIM DAS FUNÇÕES GERAIS
});
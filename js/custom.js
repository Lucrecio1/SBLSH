$(document).ready(function() {
    $('form[name="form_loginAdmin"]').submit(function() {
        var forma = $(this);
        var botao = $(this).find(':button');
        $.ajax({
            url: "ajax/controles.php",
            type: "POST",
            data: "acao=login&" + forma.serialize(),
            beforeSend: function() {
                botao.attr('disabled', true);
                $('.load').fadeIn('slow');
            },
            success: function(retorno) {
                $('.load').fadeOut('slow',function(){
                    botao.attr('disabled', false);
                });


                if (retorno == 'vazio') {
                    botao.attr('disabled', false);
                    msg('campos obrigatórios Usuário e Senha', 'alerta');
                    $('#stma').hide();

                } else if (retorno == 'naoexiste') {
                    $('#stma').hide();
                    botao.attr('disabled', false);
                    msg('os dados não correspondem aos do SBLH', 'erro');
                } else if (retorno == 'senhadiferente') {
                    $('#stma').hide();
                    botao.attr('disabled', false);
                    msg('Login errado não es um administrador', 'erro');
                } else {
                       // efeito do login
                     $('.entrar').html('Aguarde...');
                     $('.entrar').attr('disabled', true);
                     
                $('.progress').show();
                $(function(){
                    var lucrecio=0;
                    var intervalo = setInterval(function(){
                        lucrecio +=1;
                        $('#dynamic').css('width',lucrecio+'%')
                                     .attr('aria-valuenow',lucrecio)
                                     .text(lucrecio+'% Carregando SBLSH');
                                     if(lucrecio>=100)
                                        clearInterval(intervalo);
                    },40);
                });         
                    setTimeout(function() {
                        $(location).attr('href', '../SBLSH_/admin.php');
                    }, 6000);
                }
                $('#stma').delay(3000);
                $('#stma').fadeIn();
            }
        });
        return false;
    });

    // FUNÇÕES GERAIS
    function msg(msg, tipo) {
        var retorno = $('.retorno');
        var tipo = (tipo === 'sucesso') ? 'success' : (tipo === 'alerta') ? 'warning' : (tipo === 'erro') ? 'danger' : (tipo === 'info') ? 'info' : alert('informe mensagem  de sucesso, alerta, erro, info');

        retorno.empty().fadeOut('fast', function() {
            return $(this).html('<div class="alert alert-' + tipo + '">' + msg + '</div>').fadeIn('slow');
        });

        setTimeout(function() {
            retorno.fadeOut('slow').empty();
        }, 3000);

    }

});
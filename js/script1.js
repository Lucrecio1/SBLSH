// funcao top
$(document).ready(function() {

    $('.form-login').hide()
        .delay(1000)
        .show(2000);

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.top').fadeIn();
        } else {
            $('.top').fadeOut();
        }
    });

    $('.top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1150);
        return false;
    });

    $(document).ready(function () {
        $("#ocultar").click(function (event) {
            event.preventDefault();
            $("#capaefectos").hide("slow");

        });

        $("#mostrar").click(function (event) {
            event.preventDefault();
            $("#capaefectos").show(1000);
        });
    });
});
//editar e eliminar doencas
       $(document).ready(function() {
           $(".EdiD").click(function(event) {
               event.preventDefault();
               $("#id_EditD").show(1000);
               $("#id_Doenca").hide(1000);
               $("#id_Sinto").hide("slow");
               $("#id_Ver").hide(1000);
               $("#id_VerSinto").hide(1000);
               $("#id_Editsinto").hide(1000);
               $("#id_VerHosp").hide(1000);
               $("#id_EditHosp").hide(1000);
               $("#id_VerAdmin").hide(1000);
               $("#id_EditAdmin").hide("slow");
                $("#id_tabela1").hide(1000);
                $("#id_tabela2").hide(1000);
                $("#notificacao").hide("slow");
               $("#cad_doencas").hide("slow");
               $("#cadAdmin_img").hide("slow");
           });

           $("#fechared").click(function(event) {
               event.preventDefault();
               $("#id_EditD").hide("slow");
               $("#id_tabela1").show(1000);
               $("#id_tabela2").show(1000);
           });
       });
// ver doencas
       $(document).ready(function() {
           $(".Ver_Doe").click(function(event) {
               event.preventDefault();
               $("#id_Ver").show(1000);
               $("#id_EditD").hide(1000);
               $("#id_Sinto").hide("slow");
               $("#id_VerSinto").hide(1000);
               $("#id_Editsinto").hide(1000);
               $("#id_VerHosp").hide(1000);
               $("#id_EditHosp").hide(1000);
               $("#id_VerAdmin").hide(1000);
                $("#id_EditAdmin").hide(1000);
               $("#id_tabela1").hide(1000);
               $("#id_tabela2").hide(1000);
               $("#notificacao").hide("slow");
               $("#cad_doencas").hide("slow");
               $("#cadAdmin_img").hide("slow");
           });

           $("#fecharver").click(function(event) {
               event.preventDefault();
               $("#id_Ver").hide("slow");
               $("#id_tabela1").show(1000);
               $("#id_tabela2").show(1000);


           });
       })
// editar e eliminar sintomas
       $(document).ready(function() {
           $(".EditSinto").click(function(event) {
               event.preventDefault();
               $("#id_Editsinto").show(1000);
               $("#id_Ver").hide(1000);
               $("#id_EditD").hide(1000);
                $("#id_VerSinto").hide(1000);
                $("#id_VerHosp").hide(1000);
                $("#id_EditHosp").hide(1000);
                $("#id_VerAdmin").hide(1000);
                $("#id_EditAdmin").hide(1000);
               $("#id_tabela1").hide(1000);
               $("#id_tabela2").hide(1000);
               $("#notificacao").hide("slow");
               $("#cad_doencas").hide("slow");
               $("#cadAdmin_img").hide("slow");

           });

           $("#fecharedSinto").click(function(event) {
               event.preventDefault();
               $("#id_Editsinto").hide("slow");
               $("#id_tabela1").show(1000);
               $("#id_tabela2").show(1000);
           });
       });
// ver e eliminar sintomas
       $(document).ready(function() {
           $(".verSinto").click(function(event) {
               event.preventDefault();
               $("#id_VerSinto").show(1000);
               $("#id_Editsinto").hide(1000);
               $("#id_Ver").hide(1000);
               $("#id_EditD").hide(1000);
               $("#id_VerHosp").hide(1000);
               $("#id_EditHosp").hide(1000);
               $("#id_VerAdmin").hide(1000);
                $("#id_EditAdmin").hide(1000);
               $("#id_tabela1").hide(1000);
               $("#id_tabela2").hide(1000);
               $("#notificacao").hide("slow");
               $("#cad_doencas").hide("slow");
               $("#cadAdmin_img").hide("slow");

           });

           $("#fecharVerSinto").click(function(event) {
               event.preventDefault();
               $("#id_VerSinto").hide("slow");
               $("#id_tabela1").show(1000);
               $("#id_tabela2").show(1000);

           });
       });
// editar e eliminar hospitais 
       $(document).ready(function() {
           $(".EdtHosp").click(function(event) {
               event.preventDefault();
               $("#id_EditHosp").show(1000);
               $("#id_VerSinto").hide(1000);
               $("#id_Editsinto").hide(1000);
               $("#id_Ver").hide(1000);
               $("#id_EditD").hide(1000);
               $("#id_VerHosp").hide(1000);
               $("#id_VerAdmin").hide(1000);
                $("#id_EditAdmin").hide(1000);
               $("#id_tabela1").hide(1000);
               $("#id_tabela2").hide(1000);
               $("#notificacao").hide("slow");
               $("#cad_doencas").hide("slow");
               $("#cadAdmin_img").hide("slow");

           });

           $("#fecharedHosp").click(function(event) {
               event.preventDefault();
               $("#id_EditHosp").hide("slow");
               $("#id_tabela1").show(1000);
               $("#id_tabela2").show(1000);
           });
       });
// ver hospital
       $(document).ready(function() {
           $(".verHosp").click(function(event) {
               event.preventDefault();
               $("#id_VerHosp").show(1000);
                $("#id_VerSinto").hide(1000);
               $("#id_Editsinto").hide(1000);
               $("#id_Ver").hide(1000);
               $("#id_EditD").hide(1000);
                $("#id_EditHosp").hide(1000);
                $("#id_VerAdmin").hide(1000);
                $("#id_EditAdmin").hide(1000);
               $("#id_tabela1").hide(1000);
               $("#id_tabela2").hide(1000);
               $("#notificacao").hide("slow");
               $("#cad_doencas").hide("slow");
               $("#cadAdmin_img").hide("slow");

           });

           $("#fecharverHosp").click(function(event) {
               event.preventDefault();
               $("#id_VerHosp").hide("slow");
               $("#id_tabela1").show(1000);
               $("#id_tabela2").show(1000);
           });
       });
// chamar form cadastro doenca
$(document).ready(function() {
    $(".doenca").click(function(event) {
        event.preventDefault();
        $("#cad_doencas").show(1000);
        $("#id_VerSinto").hide(1000);
        $("#id_Editsinto").hide(1000);
        $("#id_Ver").hide(1000);
        $("#id_EditD").hide(1000);
        $("#id_EditHosp").hide(1000);
        $("#id_VerAdmin").hide(1000);
        $("#id_EditAdmin").hide(1000);
        $("#id_tabela1").hide(1000);
        $("#id_tabela2").hide(1000);
        $("#notificacao").hide("slow");
        $("#cadAdmin_img").hide("slow");

    });

    $("#fecharcad_doenca").click(function(event) {
        event.preventDefault();
        $("#cad_doencas").hide("slow");
        $("#id_tabela1").show(1000);
        $("#id_tabela2").show(1000);
    });
});
// chamar form admin
$(document).ready(function() {
    $(".administrador").click(function(event) {
        event.preventDefault();
        $("#cadAdmin_img").show(1000);
        $("#id_VerSinto").hide(1000);
        $("#id_Editsinto").hide(1000);
        $("#id_Ver").hide(1000);
        $("#id_EditD").hide(1000);
        $("#id_EditHosp").hide(1000);
        $("#id_VerAdmin").hide(1000);
        $("#id_EditAdmin").hide(1000);
        $("#id_tabela1").hide(1000);
        $("#id_tabela2").hide(1000);
        $("#notificacao").hide("slow");
        $("#cad_doencas").hide("slow");



    });

    $("#fecharcad_ADMINs").click(function(event) {
        event.preventDefault();
        $("#cadAdmin_img").hide("slow");
        $("#id_tabela1").show(1000);
        $("#id_tabela2").show(1000);
    });
});
//editar doenca chamando formalario
// eliminar e editar admin
       $(document).ready(function() {
           $(".EdAdmin").click(function(event) {
               event.preventDefault();
               $("#id_EditAdmin").show(1000);
               $("#id_EditD").hide(1000);
               $("#id_Doenca").hide(1000);
               $("#id_Sinto").hide("slow");
               $("#id_Ver").hide(1000);
               $("#id_VerSinto").hide(1000);
               $("#id_Editsinto").hide(1000);
               $("#id_VerHosp").hide(1000);
               $("#id_EditHosp").hide(1000);
               $("#id_VerAdmin").hide(1000);
               $("#id_tabela1").hide(1000);
               $("#id_tabela2").hide(1000);
               $("#notificacao").hide("slow");
               $("#cad_doencas").hide("slow");
               $("#cadAdmin_img").hide("slow");
           });

           $("#fecharedAdmin").click(function(event) {
               event.preventDefault();
               $("#id_EditAdmin").hide("slow");
               $("#id_tabela1").fadeIn(1000);
               $("#id_tabela2").show(1000);

           });
       });
// ver admin
       $(document).ready(function() {
           $(".VerAdmin").click(function(event) {
               event.preventDefault();
               $("#id_VerAdmin").show(1000);
               $("#id_EditAdmin").hide(1000);
               $("#id_EditD").hide(1000);
               $("#id_Doenca").hide(1000);
               $("#id_Sinto").hide("slow");
               $("#id_Ver").hide(1000);
               $("#id_VerSinto").hide(1000);
               $("#id_Editsinto").hide(1000);
               $("#id_VerHosp").hide(1000);
               $("#id_EditHosp").hide(1000);
               $("#id_tabela1").hide(1000);
               $("#id_tabela2").hide(1000);
               $("#notificacao").hide("slow");

           });

           $("#fecharverAdmin").click(function(event) {
               event.preventDefault();
               $("#id_VerAdmin").hide("slow");
               $("#id_tabela1").fadeIn(1000);
               $("#id_tabela2").fadeIn(1000);

           });
           // notificao em desenvolvimento
           $("#ver_notificao").click(function(event) {
               event.preventDefault();
               $("#notificacao").show("slow");
               $("#id_VerAdmin").hide(1000);
               $("#id_EditAdmin").hide(1000);
               $("#id_EditD").hide(1000);
               $("#id_Doenca").hide(1000);
               $("#id_Sinto").hide("slow");
               $("#id_Ver").hide(1000);
               $("#id_VerSinto").hide(1000);
               $("#id_Editsinto").hide(1000);
               $("#id_VerHosp").hide(1000);
               $("#id_EditHosp").hide(1000);
               $("#id_tabela1").hide(1000);
               $("#id_tabela2").hide(1000);

           });
            $("#fecharnot").click(function(event) {
               event.preventDefault();
               $("#notificacao").hide("slow");
               $("#id_tabela1").fadeIn(1000);
               $("#id_tabela2").fadeIn(1000);

           });
       });
// em desenvolvimento sintomas
$(document).ready(function() {
// perfil do admin
     $("#sobre_admi").click(function(event) {
       event.preventDefault();
       $("#vrm_admi").show("slow");        
       $("#sobre_admin").show("slow");
       $("#sobre_admi").hide("slow");

    });
     $("#mais_if").click(function(event) {
       event.preventDefault();
       $("#extra_admin").show("slow");
       $("#sobre_admin").hide("slow");  
       $("#sobre_admi").hide("slow"); 
       $("#vrm_admi").show("slow");   
    
    });
      $("#menus_if").click(function(event) {
       event.preventDefault();      
       $("#sobre_admin").show("slow");   
       $("#vrm_admi").show("slow");   
       $("#extra_admin").hide("slow"); 
    });
      $("#vrm_admi").click(function(event) {
       event.preventDefault();      
       $("#sobre_admi").show("slow");   
       $("#sobre_admin").hide("slow");   
       $("#vrm_admi").hide("slow");   
       $("#extra_admin").hide("slow"); 
    });
});

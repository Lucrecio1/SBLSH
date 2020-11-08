<?php
ob_start(); session_start();
require 'funcoes/login/login.php';
require 'funcoes/banco/conexao.php';
logado('administrador');
if (isset($_GET['logout']) && $_GET['logout'] == 'true'):
    session_destroy();
    header("Location: login.php");
endif;
  
?>
<!DOCTYPE html>
<html>
<head lang="pt-pt">
    <meta charset="UTF-8">
    <title>Admin2code</title>
    <?php include_once "head.php" ?>
</head>
<body  class="container" style="background-image: url('images/bg.jpg');">

<div class="site-wrap">
    <?php include_once "menu_admin.php" ?>
    <div class="row container">
        <div class="col-md-4 p-4 ">
                   <div class="card letraS " style="width: 18rem;">                     
                     <a href="" style="margin-top: 3%;">
                        <span class="profile-ava" style="margin-left: 36%;">
                            <img alt="" src="adminIMG/<?php echo $_SESSION['administrador']->id?>/<?Php echo $_SESSION['administrador']->imagem?>" class="img-fluid" width="80">
                        </span>
                    </a>
                    <div class="card-body ">    
                    <span class="username"><p class="text-center ah3"><?php echo $_SESSION['administrador']->Nome;?></p></span> 
                    <!-- <p class="card-text">
                        </p> --> 
                     </div>  
                   <div class="">
                       <ul class="list-group-item">
                     <a href="#" class="list-group-item"  data-toggle="modal" data-target="#modal_ad">
                            <span class="icon-person"> Meu Perfil </span></a></i></a>
                               <div class="site-navbar list-group-item">
                                    <nav class="site-navigation ">
                                        <ul class="site-menu">
                                            <span class=" icon-bar-chart-o text-primary" style="margin-left: -25%">
                                                <a href="graficos.php" style="font-size: 1.1em">Estatistica</a>
                                            </span>
                                            <br>
                                        </ul>
                                    </nav>
                                </div>
                        <a href="#" class="list-group-item " id="ver_notificao">
                            <span class="icon-bell" > Notificações <b class="btn-notify badge bg-info"><?php echo count(listarDados("notificacao"));?> </b></span></a>
                             <a href="#" class="list-group-item ">
                            <span class="icon-comment"> Chat <b class="btn-notify badge bg-info">0</b> </span></a>
                        <a href="?logout=true" class="list-group-item ">
                            <span class="icon-close"> Sair </span></a>
                    </ul>   
                   </div>
                </div>
        </div>
                <div class="col-md-8 p-4">
                <h2 class="site-section-heading text-center text-uppercase">Área Administrativa</h2>
                    <?php include_once"Formcad.php"?>
                    <?php include_once "CRUD.php" ?>

                </div>

                </div>        
            </div>
    </div>
<!-- Core Scripts - Include with every page -->

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/tabelas.init.js"></script>
<script type="text/javascript" src="js/script1.js"></script>
<?php include_once "admin_footer.php" ?>
<script>
    $("#maicapos").click(function(event) {
        event.preventDefault();
        $("#scinhide").hide("slow");
        $("#maicapos").hide("slow");
        $("#camposmais").show("slow");
        $('#mencapos').fadeIn();
    });
    $("#mencapos").click(function(event) {
        event.preventDefault();
        $("#scinhide").show("slow");
        $("#maicapos").show("slow");
        $("#camposmais").hide("slow");
        $('#mencapos').fadeOut();
    });
      $("#macapo").click(function(event) {
        event.preventDefault();
        $("#secForm").show("slow");
        $("#mencapo").show("slow");
        $("#macapo").hide("slow");
        $("#atual").hide();
    });
       $("#mencapo").click(function(event) {
        event.preventDefault();
        $("#secForm").fadeOut("slow");
        $("#macapo").show("slow");
        $("#mencapo").hide("slow");
        $("#atual").show();
    });
</script>

</body>
</html>
<?php ob_end_flush(); ?>
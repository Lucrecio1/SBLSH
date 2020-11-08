<?php
require 'funcoes/banco/conexao.php';
function listarDados($tabela, $id){
    $pdo = conecta();
    try{
        $listar = $pdo->query("SELECT * FROM $tabela WHERE id=$id");

        if ($listar->rowCount() > 0):
            return $listar->fetchAll(PDO::FETCH_OBJ);
        else:
            return FALSE;
        endif;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
  function listarDado($tabela){
    $pdo = conecta();
    try{
     $listar = $pdo->query("SELECT * FROM `$tabela`");

      if ($listar->rowCount() > 0):
        return $listar->fetchAll(PDO::FETCH_OBJ);
      else:
        return FALSE;
      endif;

    }catch(PDOException $e){
    echo $e->getMessage();
  }
  }
?>
<?php include_once"head.php"?>
<style>
    .fontmenu{
        font-family:'Helvetica', Arial, serif;
    }
    font-face{
        font-family: 'Helvetica', Arial, serif;
    }
</style>
<div class="site-mobile-menu fontmenu" >
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div> <!-- .site-mobile-menu -->
<div class="site-navbar-wrap js-site-navbar bg-white">

    <div class="container">
        <div class="site-navbar bg-light">
            <div class="row align-items-center">
                <div class="col-2">
                    <h2 class="mb-0 site-logo ah2">
                        <a href="index.php" class="font-weight-bold"><img src="images/SBLSlog.png" width="180"> </a>
                    </h2>
                </div>
                <div class="col-10 fontmenu " >
                    <nav class="site-navigation text-right" role="navigation">
                        <div class="container ">
                            <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3">
                                <a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3">
                                </span>
                                </a>
                            </div>
                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li class=""><a href="index.php" class="icon-home fontmenu"> Inicio</a></li>
                                <li class="has-children icon-medkit">
                                    <a href="doencas.php" class="fontmenu">Doenças</a>
                                    <ul class="dropdown arrow-top letraS">
                                        <li><a href="modal" data-toggle="modal" data-target="#modal_">Paludismo</a></li>
                                        <li><a href="modal" data-toggle="modal" data-target="#modal_1">Febre Tifoide</a></li>
                                        <li><a href="Modal" data-toggle="modal" data-target="#moda">Tuberculose</a></li>
                                        <li><a href="doencas.php">Outras Doenças</a></li>
                                    </ul>
                                </li>
                                <li><a href="sintomas.php" class="icon-frown-o letraS"> que sinto?</a></li>
                                <li><a href="ajuda.php" class="icon-lightbulb-o letraS"> Ajuda</a></li>
                                <li><a href="sobre.php" class="icon-info letraS"> Sobre</a></li>
                                <li><a href="contacto.php" class="icon-phone letraS"> Contactos</a></li>
                                <li><a href="Login.php"><span class="btn btn-primary text-white px-2 letraS">Login</span></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

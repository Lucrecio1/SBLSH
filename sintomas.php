<?php
include_once"funcoes/class/trafego.php";
new trafego();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head lang="pt-pt">
    <meta charset="UTF-8">
    <?php include_once "head.php" ?>
    <link rel="stylesheet" href="tabelas/css/style.default.css" type="text/css" />
    <script src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            // dynamic table
            jQuery('#dyntable').dataTable({
//                "sPaginationType": "full_numbers",
//                "aaSortingFixed": [[0,'asc']],
                "fnDrawCallback": function(oSettings) {
                    jQuery.uniform.update();
                }
            });
        });
    </script>
</head>

<body class="container" style="background-image: url('images/bg.jpg')";>
<?php include_once "menu.php" ?>

    <div class="site-blocks-cover inner-page overlay" data-aos="fade" data-stellar-background-ratio="0.3">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-7 text-center" data-aos="fade">
          <h1 class="ah2">O que sinto?</h1>
          <span class="caption d-block text-white letraS">Esta área está reservado para fazeres a consulta e localizares o hospital.</span>
          <a href="modal" data-toggle="modal" data-target="#modal_localizar"><span class="btn btn-primary text-white px-4 letraS pulse">Ache um hospital</span></a>
        </div>
      </div>
    </div>


<div class="bg-white p-4">
  <div class="row ">
          <div class="col-md-12">
            <h2 class="site-section-heading text-center ah2">Deixa-nos ajudar-te!</h2>
          </div>
        </div>

    <div class="row container" >
            <div class="col-12 col-md-5 col-lg-8"> 
               <p class="elretorno"></p>
              <div class="row" style="background-color: #d94808; margin-left: 0%; margin-right: 0%">
                <div class="col-2 col-md-5 col-lg-5 text-white collapse" id="sitle" style="margin-top: 2%; font-size: 1.2rem">
                    Sintomas
                </div>
                  <style>
                      .corpo121{
                          height:300px;
                          overflow-y:auto;
                          width: 100%;
                      }
                       .prevss{
                          height:190px;
                          overflow-y:auto;
                          width: 100%;
                      }
                      .corpo121{
                          display:block;
                      }
                     .InfoDoe{
                          height:190px;
                          overflow-y:auto;
                          width: 100%;
                      }
                  </style>
                <div class="col-md-7 collapse" id="btnvoltar">
                <a class="btn btn-floating bg-white pulse btn-md " style="float: right;"  href="#" ><i class="icon-arrow-circle-left text-primary" >
                 </i>
               </a></div>
               </div>

                  <div  id="sintomas" >
                      <table id="dyntable" class="table table-bordered table-striped tabela_selecionar corpo121"  STYLE="font-size: 1rem;">

                    <thead>
                    <tr>
                        <th scope="row" >Seleciona</th>
                        <th class="head0">Sintomas</th>
                    </tr>
                    </thead>

                     <tbody id="">
                     <!--<td><img src="images/load.GIF" class="load" alt="Carregando"></td> -->
                     <?php 
                     if (listarDado("sintomas")):
                    $admin = listarDado("sintomas");
                    foreach ($admin as $adm) :
                        ?>
                        <tr>
                          <td scope="row">
                          <label class="sel" >
                              <input type="radio" class="skip" name="radio-btn" id="rdo" data-id="<?php echo $adm->Sintoma; ?>" value="0">
                              <span class="org2"></span>
                          </label>
                    </td>
                    <td scope="row"><?php echo $adm->Sintoma; ?></td>
                </tr>
            <?php
            endforeach;
        else:
        endif; ?>
                     </tbody>
                 </table>
                  </div>
               <!-- resultdo dos sintomas -->

            <div  class="collapse" id="Resultado">      
                <table  class="table table-bordered table-striped " >
                    <thead>
                    <tr>
                        <th class="sinselect">Sintoma selecionado</th>
                    </tr>
                    </thead>
                    <tbody>
                    <td>
                     <h5 class="card-title ah3" id="diagn">  
                     </h5>
                         <p class="card-text letraS">
                    <div class="border p-2">
                       <div class="infodasdoencas">
                        <p style="font-size: 1.1em; color: red"> A doença que corresponde aos sintomas selecionado é <b class="result"></b></p>
                               <h2 style="font-size: 1.4rem" >Informações da doença</h2>
                               <div id="..">

                       <p class="text-black InfoDoe letraS border text-justify alinhar container bg-white"></p>
                    </div> </div>
                         <div id="psocorros" class="collapse">
                        <h2 style="font-size: 1.4rem">Passos a serem seguidos.</h2>
                       <p>
                             <div class="output prevss" style="min-height: 125px;">
                                 <ul class="text-black letraS bg-white"></ul>
                             </div>
                       </p>
                    </div>
                  </div>
                  <a href="#" class=" btn btn-outline-secondary btn-sm" id="versocorro">primeiro socorro</a>
                  <a href="#" class=" btn btn-outline-secondary btn-sm" id="prevencao">Prevenção</a>
                  <a href="#" class=" btn btn-outline-secondary btn-sm" id="causas">Causas</a>
                  <a href="#" href="#" class="btn btn-outline-secondary btn-sm collapse" id="VerRESULT">ver resultado</a>
                    </p>                                                     
                       </td>
                    </tbody>
                    
                </table>
                  </div>
                  </div>
            <div class="col-12 col-md-12 col-lg-4">
<!--                <div class="text-white letraS" style="background-color: #d94808"> Mapa de angola</div>-->
                    <?php include_once"mapas.php"?>
          </div>

<!--        EXEMPLOS-->
        <!-- Learn about this code on MDN: https://developer.mozilla.org/pt-BR/docs/Learn/JavaScript/First_steps/Useful_string_methods -->


    </div>
</div>



<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/main.js"></script>
<script src="js/script1.js" type="text/javascript"></script>
<script src="js/custom.js" type="text/javascript"></script>
<script src="js/admin.js" type="text/javascript"></script>
<script src="js/area_externa.js" type="text/javascript"></script>
<script type="text/javascript" src="tabelas/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="tabelas/js/tab.js"></script>
<?php include_once "footer.php"?>
</body>

</html>
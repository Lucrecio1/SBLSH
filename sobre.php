<?php
include_once"funcoes/class/trafego.php";
new trafego();
?>
<!DOCTYPE html>
<html>
<head lang="pt-PT">
    <meta charset="UTF-8">
    <title></title>
    <?php include_once "head.php" ?>
</head>

<body class="container" style="background-image: url('images/bg.jpg');">
<?php include_once "menu.php" ?>

    <div class="site-blocks-cover inner-page overlay" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-7 text-center" data-aos="fade">
          <h1 class="ah2">Sobre</h1>
          <span class="caption d-block text-white letraS">Veja mais abaixo sobre quem são os criadores do SBLSH e mais sobre esse sistema.</span>
        </div>
      </div>
    </div>  
    

<!-- Sobre os Criadores -->
<div class="p-4" style="background-image: url('images/topography.png'); background-attachment: fixed">
    <div class="container">
        <div class="row mb-1">
            <div class="col-md-12">
                <h2 class="site-section-heading text-center ah2">Criadores</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <img src="images/Matias.jpg" alt="Image" class="img-fluid rounded-circle w-25 mb-4">
                <h2 class="h5 ah2">Raúl Matias</h2>
                <span class="d-block mb-2 ah3">Programador</span>
                <p class="font-weig mb-2 lead letraS">Raúl Matias nasceu em Angola na província de Luanda, município do Cazenga. Uma das suas paixões é a programação. Começou a estudar informática em 2016 no IMIL e concluiu em 2019 na 13.ª classe.</p>
            </div>
            <div class="col-md-6 text-center">
                <img src="images/Lucrecio.jpg" alt="Image" class="img-fluid rounded-circle w-25 mb-4">
                <h2 class="h5 ah2">Lucrécio Barnabé</h2>
                <span class="d-block mb-2 ah3">Programador</span>
                <p class="font-weig mb-2 lead letraS">Lucrécio Barnabé nasceu em Angola na província do Moxico, cidade de Luena, apaixonado pela programação. Em 2016 deu início ao curso técnico de informática na área de informática no IMIL e concluiu no ano de 2019 na 13.ª classe.</p>
            </div>
        </div>
    </div>
</div>

  <div class="site-half bg-white">
    <div class="img-bg-1" style="background-image: url('images/mda3.jpg');"></div>
    <div class="container">
      <div class="row no-gutters align-items-stretch">
        <div class="col-md-5 ml-md-auto py-5">
          <span class="caption d-block mb-2 font-secondary ah2">Sobre o Sistema</span>
          <h2 class="site-section-heading text-uppercase font-secondary mb-3 ah3">SBLSH</h2>
          <p class="letraS">SBLSH é abreviação de <i>Sistema de Busca e Localização de Serviços Hospitalares</i>, tem como principal objetivo, dar apoio as pessoas no que concerne a saúde. É interessante notar que não tem nenhum sistema igual a esse, pois este mostra que doença tens através dos sintomas que forneceres, dar-te-á informações sobre a doença, como surgem e como se prevenir, mostrará também o hospital mais próximo de si.</p>

          <p class="letraS">Uma Novidade é que na versão 2 já vai dar para marcar consultas online. É realmente um sistema comum, mas especial.</strong></p>
        </div>
      </div>
    </div>
  </div>

<?php include_once "script.php" ?>
<?php include_once "footer.php" ?>

</body>

</html>
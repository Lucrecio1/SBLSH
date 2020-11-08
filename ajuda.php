<?php
include_once"funcoes/class/trafego.php";
new trafego();
?>
<!DOCTYPE html>
<html>
<head lang="pt-pt">
    <meta charset="UTF-8">
    <title>Ajuda</title>
    <?php include_once "head.php" ?>
</head>
<body class="container" style="background-image: url('images/bg.jpg');">

<div class="site-wrap">
    <?php include_once "menu.php" ?>
<!-- img da ajuda -->
    <div class="site-blocks-cover inner-page overlay" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
                <h1 class="text-uppercase ah2">Ajuda</h1>
                <span class="caption d-block text-white letraS">Está área fornece a ajuda necessária de como utilizar bem este sistema.</span>
            </div>
        </div></div>

    <div class="p-4">
        <div class="container">
            <!-- teitulo da ajuda -->
            <div class="row p-2">
                <div class="col-md-12">
                    <h2 class="site-section-heading text-center text-uppercase ah2">Secções de Ajuda</h2>
                </div>
            </div>
            <!-- conteudo da ajuda -->
            <div class="row">
                <div class="col-md-4 text-center mb-4">
                    <div class="border p-4 text-with-icon">
                        <span class="icon-map icon display-4 mb-4 d-block text-primary"></span>
                        <h2 class="ah2">Mapas</h2>
                        <p class="text-black">O <b>Mapa</b> neste sistema chega a ser a parte, mas crucial, pois permite mostrar-te a localização...</p>
                        
                        <a href="modal" data-toggle="modal" data-target="#modal_4">Ver mais</a>
                    </div></div>
                <div class="col-md-4 text-center mb-4">
                    <div class="border p-4 text-with-icon">
                        <span class="icon-frown-o icon display-4 mb-4 d-block text-primary"></span>
                        <h2 class="ah2">Os meus Sintomas</h2>
                       <p class="text-black">Na página <b>O que sinto?</b> é para veres que possível doença tens e mostrar-te uma breve descrição...</p>
                        <a href="modal" data-toggle="modal" data-target="#modal_5">Ver mais</a>
                    </div></div>
                <div class="col-md-4 text-center mb-4">
                    <div class="border p-4 text-with-icon">
                        <span class="icon-medkit icon display-4 mb-4 d-block text-primary"></span>
                        <h2 class="ah2">Doenças</h2>
                        <p class="text-black">Na pagina <b>Doenças</b> é onde aparece todas as doenças registradas no sistema...</p>
                        <a href="modal" data-toggle="modal" data-target="#modal_6">Ver mais</a>
                    </div></div>
                <div class="col-md-4 text-center mb-4">
                    <div class="border p-4 text-with-icon">
                        <span class="icon-lock icon display-4 mb-4 d-block text-primary"></span>
                        <h2 class="ah2">Login</h2>
                        <p class="text-black">O <b>Login</b> é onde o administrador da pagina vai poder  acessar à parte administrativa do sistema… </p>
                        <a href="modal" data-toggle="modal" data-target="#modal_7">Ver mais</a>
                    </div></div>
                <div class="col-md-4 text-center mb-4">
                    <div class="border p-4 text-with-icon">
                        <span class="icon-phone icon display-4 mb-4 d-block text-primary"></span>
                        <h2 class=" ah2">Contactos</h2>
                        <p class="text-black">Na pagina <b>contactos</b> é onde os visitantes da paginas poderão entrar em contacto connosco…</p>
                        <a href="modal" data-toggle="modal" data-target="#modal_8">Ver mais</a>
                    </div></div>
                <div class="col-md-4 text-center mb-4">
                    <div class="border p-4 text-with-icon">
                        <span class="icon-info icon display-4 mb-4 d-block text-primary"></span>
                        <h2 class="ah2">Sobre</h2>
                        <p class="text-black"> <b>Sobre</b> é onde estão as informações do sistema e dos criadores. esta informação é para si que...</p>
                        <a href="modal" data-toggle="modal" data-target="#modal_9">Ver mais</a>
                    </div></div>
            </div>
        </div></div>
</div>
    <?php include_once "script.php" ?>
    <?php include_once "footer.php" ?>
    <?php include_once "ModalD.php"?>
</body>
</html>
<?php
include_once"funcoes/class/trafego.php";
new trafego();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <?php include_once "head.php" ?>
</head>
<body class="container" style="background-image: url('images/bg.jpg');">

<div class="site-wrap">

    <?php include_once "menu.php" ?>

    <div class="site-blocks-cover inner-page overlay" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
                <h1 class="ah2">Contacte-nos</h1>
                <span class="caption d-block text-white letraS"> Informa-nos o que achou do sistema e o que gostarias que melhorasse. </span>
            </div>
        </div>
    </div>

    <div class="py-3" style="background-image: url('images/topography.png'); background-attachment: fixed">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-8 mb-5 letraS">
                    <form action="" name="form_contacto" method="post" class="p-5 bg-white">
                        <div class="retorno"></div>
                        <div class="row form-group ">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="nomeCompleto">Nome completo</label>
                                <input type="text" name="nomeCompleto" autocomplete="off" value="nome completo" onfocus="this.value='';" class="form-control" placeholder="Nome completo" pattern="[a-zA-Z\s]+$" title="Somente letras é permitido">
                            </div>
                        </div>
                        <div class="row form-group ">
                            <div class="col-md-12">
                                <label class="text-black" for="email">Email</label>
                                <input type="email" name="email"  autocomplete="off" value="Email Endereço" onfocus="this.value='';"  class="form-control " placeholder="Email Endereço" title="Digite email valido">
                            </div>
                        </div>

                        <div class="col-md-12">
                             <div class="row form-group">
                                <label class="text-black" for="classificacao">Classifique a nossa aplicação</label>
                                <select class="form-control" value="selecione" onfocus="this.value='';" name="classificacao">
                                     <option disabled=""></option>
                                     <option>Excelente</option>
                                     <option>Boa</option>
                                     <option>Razoavel</option>
                                     <option>Pessíma</option>
                                </select>
                             </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="message">Deixa sua Crítica ou elogio...</label>
                                <textarea name="message"  autocomplete="off" value="Deixa sua Crítica ou elogio..." onfocus="this.value='';" cols="30" rows="5" class="form-control letraS" placeholder="O Seu comentário é importante para nós..."></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary text-white px-4 py-2"> Enviar </button>
                            </div>
                        </div>


                    </form>
                </div>

                <div class="col-lg-4">
                    <div class="p-4 mb-3 bg-white letraS">
                        <h3 class="h5 text-black mb-3 letraS">Informações</h3>
                        <p class="mb-0 font-weight-bold letraS">Endereço</p>
                        <p class="mb-4 letraS">Rua do Norberto de castro. Capalanga, Viana, Luanda, Angola</p>

                        <p class="mb-0 font-weight-bold letraS">Telefone</p>
                        <p class="mb-4 letraS"><a href="#">+244 925579400</a><br>
                        <p class="mb-4 letraS"><a href="#">+244 914979999</a><br>


                        <p class="mb-0 font-weight-bold letraS">Email</p>
                        <p class="mb-0 letraS"><a href="#">2code@icloud.com</a></p>
                    </div>


                </div>
            </div>
        </div>
    </div>
<?php include_once "script.php" ?>
    <?php include_once "footer.php" ?>
</div>
</body>
</html>
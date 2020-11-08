<?php
include_once"funcoes/class/trafego.php";
new trafego();
?>
<!DOCTYPE html>
<html>
<head lang="pt-pt">
    <meta charset="UTF-8">
    <?php include_once "head.php" ?>
    <link rel="stylesheet" type="text/css" href="pgccs/estilo.css" />
    <style>
        figure.foto-legenda
        {
            position: relative;
            border: 8px solid white;
            box-shadow: 1px 1px 4px black;
        }
        figure.foto-legenda
        img
        {
            width:  550px;
            height: 250px;
        }
        figure.foto-legenda
        figcaption
        {
            opacity: 0;
            position: absolute;
            top: 0px;
            background-color: rgba(0,0,0,.4);
            color: white;
            width: 100%;
            height: 100%;
            padding: 5px;
            box-sizing: border-box;
            transition: opacity 1s;
        }
        figure.foto-legenda:hover figcaption
        {
            opacity: 1;
        }

    </style>
</head>
<body class="container" style="background-image: url('images/bg.jpg');">

<div class="site-wrap">

    <?php include_once "menu.php" ?>

    <div class="site-blocks-cover inner-page overlay"  data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
                <h1 class="ah2">Doenças</h1>
          <span class="caption d-block text-white letraS">Está área é para o manter informado. <br>Para saber mais sobre as doenças, como são causadas e como prevenir.
          </span>
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="container">
            <div class="row">
               <?php

               //inclui as bibliotecas
               require_once('funcoes/class/clascone.php');
               //faz a conexão com o BD
               $pdo = new Conexao();
               //determina o numero de registros que serão mostrados na tela
               $maximo = 6;
               //pega o valor da pagina atual
               $pagina = isset($_GET['pagina']) ? ($_GET['pagina']) : '1';

               //subtraimos 1, porque os registros sempre começam do 0 (zero), como num array
               $inicio = $pagina - 1;
               //multiplicamos a quantidade de registros da pagina pelo valor da pagina atual
               $inicio = $maximo * $inicio;
               //fazemos um select na tabela que iremos utilizar para saber quantos registros ela possui
               $strCount = $pdo->select("SELECT COUNT(*) AS 'total_Doença' FROM doencas");
               //iniciamos uma var que será usada para armazenar a qtde de registros da tabela
               $total = 0;
               if(count($strCount)){
                   foreach ($strCount as $row) {
                       //armazeno o total de registros da tabela para fazer a paginação
                       $total = $row["total_Doença"];
                   }
               }
               //guardo o resultado na variavel pra exibir os dados na pagina
               $result = $pdo->select("SELECT * FROM doencas order by Doenca LIMIT $inicio,$maximo");
               //dados para os botões
               $previous = $pagina - 1;
               $next = $pagina + 1;
               //usa uma funcção "ceil" para arrendondar o numero pra cima, ex 1,01 será 2
               $pgs = ceil($total / $maximo);
                                    $i=0;
               $nome="Lucrecio_";
                       foreach ($result as $doenca) :
                           ?>

                       <div class="col-md-6 col-lg-4 mb-5">
                       <div class="media-image">
                           <figure class="foto-legenda">
                               <img src="images/<?php echo $doenca['id']?>/<?php echo $doenca['imagem']?>" alt=" Erro de Image " class="img-fluid imag">
                               <figcaption>
                                   <h4 class="text-primary"><?php echo $doenca['Doenca'] ?></h4>
                                   <p> Leia mais sobre esta Doença.</p>
                               </figcaption>
                           </figure>
                       <div class="media-image-body">

                           <h2 class="ah2"><?php echo $doenca['Doenca'] ?></h2>


                           <p class="letraS"><?php echo substr($doenca['Descricao'],0,60).'...'; ?></p>

                               <p class="letraS"><a href="Modal" data-toggle="modal" data-target="#<?php if($pagina==1) {
                                       echo $nome . $i;
                                   }
                                   elseif($pagina==2){
                                       $r=$pagina*2+2+$i; echo $nome.$r;
                                   }
                                   elseif($pagina==3){
                                       $r=$pagina*4+$i; echo $nome.$r;
                                   } elseif($pagina==4){
                                       $r=$pagina*5+$i-2; echo $nome.$r;
                                   }elseif($pagina==5){
                                       $r=$pagina*5+$i-1; echo $nome.$r;
                                   } elseif($pagina==6){
                                       $r=$pagina*5+$i; echo $nome.$r;
                                   }
                                   ?>"   class="btn btn-primary  text-white px-4"><span class="caption">Saber mais</span></a></p>

                        </div>
                    </div>
                </div>

               <?php $i++; endforeach;?>
</div>
            <!-- Paginação -->
            <div class="row">
                <div class="col-12 text-center mb-4">

                    <nav aria-label="Navegação de página exemplo">
                        <ul class="pagination justify-content-center daniel">
                            <!-- depois de preencher a tabela com os valores, criamos os botoes de paginação -->
                            <div id="alignpaginacao">
                                <?php
                                //determina de quantos em quantos links serão adicionados e removidos
                                $max_links = 4;

                                //se a tabela não for vazia, adiciona os botões
                                if($pgs > 1 ){
                                    echo "<br/>";
                                    //botao anterior
                                    if($previous > 0){
                                        echo "<div id='botaoanterior' >
                        <a href=".$_SERVER['PHP_SELF']."?pagina=$previous>
                        <input type='submit'  name='bt-enviar' id='bt-enviar' value='Anterior' class='btn btn-sm btn-outline-primary page-link' /></a></div>";
                                    } else{
                                        echo "<div id='botaoanteriorDis'><a href=".$_SERVER['PHP_SELF']."?pagina=$previous>
                                        <input type='submit'  name='bt-enviar' id='bt-enviar' value='Anterior' class='btn btn-outline-primary btn-sm page-link' disabled='disabled'/></a></div>";
                                    }

                                    echo "<div id='numpaginacao'>";
                                    for($i=$pagina-$max_links; $i <= $pgs-1; $i++) {
                                        if ($i <= 0){
                                            //enquanto for negativo, não faz nada
                                        }else{
                                            //senão adiciona os links para outra pagina
                                            if($i != $pagina){
                                                if($i == $pgs){ //se for o final da pagina, coloca tres pontinhos
                                                    echo "<a class='current page-link btn-sm' href=".$_SERVER['PHP_SELF']."?pagina=".($i).">$i</a> ...";
                                                }else{
                                                    echo "<a class='current page-link btn-sm' href=".$_SERVER['PHP_SELF']."?pagina=".($i).">$i</a>";
                                                }
                                            } else{
                                                if($i == $pgs){ //se for o final da pagina, coloca tres pontinhos
                                                    echo "<span class='current page-link btn-sm'> ".$i."</span> ...";
                                                }else{
                                                    echo "<span class='current page-link btn-sm'> ".$i."</span>";
                                                }
                                            }
                                        }
                                    }

                                    echo "</div>";

                                    //botao proximo
                                    if($next <= $pgs){
                                        echo " <div id='botaoprox'><a href=".$_SERVER['PHP_SELF']."?pagina=$next>
                                        <input type='submit'  name='bt-enviar' id='bt-enviar' value='Proxima' class='btn btn-outline-primary btn-sm page-link'/></a></div>";
                                    }else{
                                        echo " <div id='botaoproxDis'><a href=".$_SERVER['PHP_SELF']."?pagina=$next>
                                    <input type='submit'  name='bt-enviar' id='bt-enviar' value='Proxima' class='btn btn-outline-primary btn-sm page-link' disabled='disabled'/></a></div>";
                                    }
                                }
                                ?>
                            </div>
                        </ul>
                    </nav>

                </div>
                </div>
            </div>

        </div>
    </div>
</div>



<!-- Área dos Modais dos usuarios-->
<style>
    .modal-dialog,
    .modal-content {
        /* 80% of window height */
        height: 80%;
    }
    .rolagem{
        /* 100% = dialog height, 120px = header + footer */
        max-height: calc(100% - 120px);
        overflow-y: scroll;
    }
</style>
<?php
$pdo = conecta();

$dadosdoenca= $pdo->query("select id,Doenca,Descricao from doencas order by Doenca");
$result = $dadosdoenca->fetchAll(PDO::FETCH_OBJ);

$i=0;
$nome="Lucrecio_";
foreach ($result as $doenca) :
    ?>

    <div class="modal fade" id="<?php echo $nome.$i;?>" tabindex="-1" role="dialog">
        <div class="modal-dialog " role="document">
            <div class="modal-content">

                <div class="modal-header bg-primary">

                    <h5 class="modal-title text-white ah2"><?php echo $doenca->Doenca?></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>

                </div>

                <div class="modal-body rolagem" data-spy="scroll" data-target="cont1">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <p class="letraS  alinhar text-justify"> <?php echo $doenca->Descricao; ?> </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php $i++; endforeach; ?>


<?php include_once "script.php" ?>
<?php include_once "footer.php" ?>

</body>
</html>
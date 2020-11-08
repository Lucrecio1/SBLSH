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
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <?php include_once "head.php" ?>

</head>
<body class="container" style="background-image: url('images/bg.jpg');">
<?php include_once "menu_admin.php"?>
<div class="site-wrap">
    <div class="row container ">
        <div class="col-md-12 p-2">
            <h2 class="site-section-heading text-center text-uppercase">Área Administrativa e Estatísticas</h2>
        </div>
            <div class="col-md-6 p-4">
                <div class="card">
                    <h5 class="card-header icon-line-chart text-white" style="background-color: #d94808"> Visitas por horas</h5>
                    <canvas id="linechart" width="600" height="330" style="background-color: #0a0d30"></canvas></div>
            </div>

            <div class="col-md-6 p-4">
                <div class="card">
                    <h5 class="card-header icon-bar-chart-o text-white" style="background-color: #d94808"> Visitas por semanas</h5>
                    <canvas id="semanal" width="168" height="330" style="background-color: #0a0d30"></canvas>
                </div>
            </div>

                 <div class="col-md-6 p-4 ">
                         <div class="card">
                         <h5 class="card-header icon-line-chart text-white" style="background-color: #d94808"> Visitas por mês</h5>
                            <canvas id="mensal" width="600" height="330" style="background-color: #0a0d30"></canvas>
                         </div>
                 </div>

            <div class="col-md-6 p-4">
                <div class="card">
                    <h5 class="card-header icon-pie-chart text-white"  style="background-color: #d94808"> Visitas por plataforma</h5>
                    <canvas id="plataforma" width="360" height="330" style="background-color: #0a0d30"></canvas>
                </div>
            </div>
    </div>
</div>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/chart.js"></script>
<script type="text/javascript" src="js/chart.init.js"></script>
<?php include_once "admin_footer.php" ?>
</body>
</html>
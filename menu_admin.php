<?php
require 'funcoes/crud/crud.php';
require 'funcoes/crud/crud_externo.php';
?> 
<div class="site-mobile-menu">
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
            <div class="col-10">
              <nav class="site-navigation text-right" role="navigation">
                <div class="container">
                  <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                  <ul class="site-menu js-clone-nav d-none d-lg-block letraS">
                    <li class="active"><a href="admin.php">Início</a></li>
                    <li class="has-children">
                      <a href="#">Doenças</a>
                      <ul class="dropdown arrow-top">

                        <li><a href="#" class="doenca" ><i class="icon-save"></i> Cadastrar</a></li>
                        <li><a href="#" class="EdiD" ><i class="icon-edit"></i> Editar / Eliminar</a></li>
                        <li><a href="#" class="Ver_Doe"><i class="icon-eye"></i> Visualizar</a></li>
                      </ul>
                    </li>
                    <li class="has-children">
                      <a href="#">Síntomas</a>
                        <ul class="dropdown arrow-top">
                            <li><a href="#" id="sintoma"><i class="icon-heartbeat"></i> Cadastrar</a></li>
                            <li><a href="#" class="EditSinto"><i class="icon-edit"></i> Editar / Eliminar</a></li>
                            <li><a href="#" class="verSinto"><i class="icon-eye"></i> Visualizar</a></li>
                        </ul>
                    </li>
                      <li class="has-children">
                      <a href="#">Hospitais</a>
                          <ul class="dropdown arrow-top">
                              <li><a href="#" id="hospital"><i class="icon-h-square"></i> Cadastrar</a></li>
                              <li><a href="#" class="EdtHosp"><i class="icon-edit"></i> Editar / Eliminar</a></li>
                              <li><a href="#" class="verHosp"><i class="icon-eye"></i> Visualizar</a></li>
                          </ul>
                    </li>
                      <li class="has-children">
                      <a href="#">Administradores</a>
                          <ul class="dropdown arrow-top">
                              <li><a href="#" class="administrador"><i class="icon-person"></i> Cadastrar</a></li>
                              <li><a href="#" class="EdAdmin"><i class="icon-edit"></i> Editar / Eliminar</a></li>
                              <li>
                                <a href="#" class="VerAdmin"><i class="icon-eye"></i>Visualizar 
                                <b style="margin-left: 60px; color: white; border-bottom: solid;" class="badge bg-info"><?php echo count(listarDados("tb_admin"));?></b>
                              </a>
                            </li>
                          </ul>
                    </li><br>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
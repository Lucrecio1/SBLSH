<?php
require '../funcoes/banco/conexao.php';
require '../funcoes/crud/crud.php';
$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);

switch ($acao) {
  // PARA O ADMIN
  case 'form_cad_sintoma':
?>
        <div class="retorno"></div>
    
        <form action="" name="form_cad_sintoma" method="post" class="letraS bg-white">
            <div class="form-group">
                     <label class="text-black" for="sintoma">Síntoma </label>
                     <input type="text" name="sintoma" class="form-control" autocomplete="off" placeholder="Síntoma">
            </div>
            <div class="form-group">
               <label class="text-black" for="informacoes">Primeiros socorros: </label>
               <textarea cols="30" rows="5" name="informacoes" autocomplete="off" class="font-weight-bold form-control" placeholder="Informações"></textarea>
            </div>
           
            <img src="images/load.GIF" class="load" alt="Carregando" style="width: 180px; display: none;">
            <button type="submit" class="btn btn-primary text-white">Cadastrar</button>
          
        </form>
<?php
    break;
    case 'form_cad_hospital':
?>
        <div class="retorno"></div>
    
        <form action="" name="form_cad_hospital" method="post" class="letraS bg-white">
          <div class="row">
              <div class="col-md-6">
            <div class="form-group">
                     <label class="text-black" for="nomeh">Nome do Hospital </label>
                     <input type="text" name="nomeh" class="form-control" autocomplete="off" placeholder="Nome do Hospital">
            </div>
                  <div class="form-group">
                      <label class="text-black" for="endereco">Província</label>
                      <input type="text" name="Provincia" class="form-control" autocomplete="off" placeholder="Província">
                  </div>

                  <div class="form-group">
                      <label class="text-black" for="endereco">Município</label>
                      <input type="text" name="Municipio" class="form-control" autocomplete="off" placeholder="Município">
                  </div>
          </div>
           <div class="col-md-6">
            <div class="form-group">
                    <label class="text-black" for="lng">Longitude </label>
                    <input type="text" name="lng" class="form-control" autocomplete="off" placeholder="Longitude">
                </div>
                <div class="form-group">
                    <label class="text-black" for="lat">Latitude </label>
                    <input type="text" name="lat" class="form-control" autocomplete="off" placeholder="Latitude" >
                </div>
                <div class="form-group">
                      <label class="text-black" for="endereco">Endereço </label>
                      <input type="text" name="endereco" class="form-control" autocomplete="off" placeholder="Endereço do Hospital">
                  </div>
            </div>
           </div>

<!--           <div class="form-group">-->
<!--                <label class="text-black" for="Hora">Tipo </label>-->
<!--                <input type="text" name="Hora" class="form-control" placeholder="Tipo">-->
<!--            </div>-->
            <img src="images/load.GIF" class="load" alt="Carregando" style="width: 180px; display: none;">
            <button type="submit" class="btn btn-primary text-white">Cadastrar</button>
          
        </form>

      <?php
      break;
            case 'form_edit': 
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
              $dados = pegaId($id,"tb_admin");   
            ?>
               <div class="retorno"></div>
    
        <form action="" name="form_edit" method="post" class="letraS bg-white">
          <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                     <label class="text-black" for="nome">Nome Completo </label>
                     <input type="text" name="nome" class="form-control" value="<?php echo $dados->Nome; ?>" autocomplete="off" placeholder="Nome Completo" pattern="[a-zA-Z\s]+$" title="Somente letras é permitido">
               </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label class="text-black" for="user">Nome de Usuário</label>
                    <input type="text" name="user" value="<?php echo $dados->User; ?>" class="form-control" autocomplete="off" placeholder="Nome de Usuário">
                </div>
                </div>
              </div> 
               <div id="scinhideedit">
               <div class="row">
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="text-black" for="senha">Senha </label>
                    <input type="password" name="senha"  class="form-control" autocomplete="off" placeholder="Digite uma nova Senha">
                  </div>
               </div>
               <div class="col-md-6">
                <div class="form-group">
                    <label class="text-black" for="email">Correio Electronico </label>
                    <input type="text" name="email" value="<?php echo $dados->email; ?>" class="form-control" autocomplete="off" placeholder="Email">
                </div>
              </div>
              </div>
                        <input type="hidden" name="id" value="<?php echo $dados->id; ?>">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label class="text-black" for="imagem">Imagem do Usuário</label>
                    <input type="text" name="imagem"  class="form-control" value="<?php echo $dados->imagem; ?>" autocomplete="off" placeholder="Imagem ">
               </div>
              </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label class="text-black" for="Naturalidade">Naturalidade</label>
                    <input type="text" name="Naturalidade" class="form-control" value="<?php echo $dados->Naturalidade; ?>" autocomplete="off" placeholder="Naturalidade">
               </div>
              </div>
            </div>
            </div>
        <div class="collapse" id="camposmaisedit">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="text-black" for="Genero">Genero</label>
                        <select  class="form-control" value="<?php echo $dados->Genero; ?>"  name="Genero">
                            <option >Masculino</option>
                            <option>Femenino</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="text-black" for="data">Data de Nascimento</label>
                        <input type="date" name="data" value="<?php echo $dados->aniversario; ?>" class="form-control" autocomplete="off" placeholder="Data de Nascimento">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="text-black" for="Facebook">Facebook</label>
                        <input type="text" name="Facebook" value="<?php echo $dados->Facebook; ?>" class="form-control" autocomplete="off" placeholder="Facebook">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="text-black" for="Telefone">Número de Telefone</label>
                        <input type="text" min="0" maxlength="14" name="Telefone" value="<?php echo $dados->Telefone; ?>" class="form-control" autocomplete="off" placeholder="No Telefone" pattern="[0-9]+$" required="" title="apenas número">
                    </div>
                </div>
            </div>
        </div>
            
          </div>
            <img src="images/load.GIF" class="load" alt="Carregando" style="width: 180px; display: none;">
            <button type="submit" class="btn btn-primary text-white">Actualizar</button>
            <input type="button"  class="btn btn-primary text-white" value="outros campos" id="maicaposedit">
            <input type="button"  class="btn btn-primary text-white collapse" value="campos anteriores" id="mencaposedit">
          
        </form>
         <script type="text/javascript">
           $("#maicaposedit").click(function(event) {
       event.preventDefault();
       $("#scinhideedit").hide("slow"); 
       $("#maicaposedit").hide("slow"); 
       $("#camposmaisedit").show("slow");
       $('#mencaposedit').fadeIn();

    });
        $("#mencaposedit").click(function(event) {
       event.preventDefault();
       $("#scinhideedit").show("slow"); 
       $("#maicaposedit").show("slow"); 
       $("#camposmaisedit").hide("slow");
       $('#mencaposedit').fadeOut();

    });
        </script>
        <?php 
              break;
// BUSCANDO OS DADOS DA BD E PÔR NAS TABELAS
      case 'listarAdmin':
        if (listarDados("tb_admin")): 
            $admin = listarDados("tb_admin");
            foreach ($admin as $adm) :
            ?>
            <tr>
              <td scope="col"><?php echo $adm->id; ?></td>
              <td scope="col"><?php echo $adm->Nome; ?></td>
              <td scope="col"><?php echo $adm->User; ?></td>
              <td scope="col"><?php echo $adm->email; ?></td>
              <td scope="col"><?php echo $adm->Naturalidade; ?></td>
              <td scope="col"><?php echo substr($adm->senha, 0,4); ?></td>
              <td scope="col"><?php echo $adm->imagem; ?></td>
              <td scope="col"><?php echo $adm->Genero; ?></td>
              <td scope="col"><?php echo $adm->Facebook; ?></td>
              <td scope="col"><?php echo $adm->Telefone; ?></td>
              <td scope="col"><?php echo $adm->aniversario; ?></td>
              <td><a href="#" id="btn_edit" data-id="<?php echo $adm->id; ?>"><i class="icon-edit btn-lg"></i></a></td>
              <td><a href="#" id="btn_excluir" data-id="<?php echo $adm->id; ?>"><i class="icon-delete btn-lg"></i></a></td>
            </tr>
        <?php
        endforeach; 
    else:
        endif;  
    break;
     // APENAS LISTAR
          case 'listarAdmin_':
        if (listarDados("tb_admin")): 
            $admin = listarDados("tb_admin");
            foreach ($admin as $adm) :
            ?>
            <tr>
              <td scope="col"><?php echo $adm->id; ?></td>
              <td scope="col"><?php echo $adm->Nome; ?></td>
              <td scope="col"><?php echo $adm->User; ?></td>
              <td scope="col"><?php echo $adm->email; ?></td>
              <td scope="col"><?php echo $adm->Naturalidade; ?></td>
              <td scope="col"><?php echo substr($adm->senha, 0,4) ; ?></td>
              <td scope="col"><?php echo $adm->imagem; ?></td>
              <td scope="col"><?php echo $adm->Genero; ?></td>
              <td scope="col"><?php echo $adm->Facebook; ?></td>
              <td scope="col"><?php echo $adm->Telefone; ?></td>
              <td scope="col"><?php echo $adm->aniversario; ?></td>
            </tr>
        <?php
        endforeach; 
    else:
        endif;  
    break;
    // LISTAR E EDITAR
    case 'listarDoenca':
        if (listarDados("doencas")): 
            $admin = listarDados("doencas");
            foreach ($admin as $adm) :
            ?>
            <tr>
              <td scope="col"><?php echo $adm->id; ?></td>
              <td scope="col"><?php echo $adm->Doenca; ?></td>
              <td scope="col"><?php echo substr($adm->id_sintomas,0,50).'...'; ?></td>
              <td scope="col"><?php echo substr($adm->Descricao,0,100).'...';?></td>
              <td><a href="#" id="btn_edit" data-id="<?php echo $adm->id; ?>"><i class="icon-edit btn-lg"></i></a></td>
              <td><a href="#" id="btn_excluir" data-id="<?php echo $adm->id; ?>"><i class="icon-delete btn-lg"></i></a></td>
            </tr>

        <?php
        endforeach; 
    else:
        endif;  
   break;
   // APENAS LISTAR
   case 'listarDoenca_':
        if (listarDados("doencas")): 
            $admin = listarDados("doencas");
            foreach ($admin as $adm) :
            ?>
            <tr>
              <td scope="col"><?php echo $adm->id; ?></td>
              <td scope="col"><?php echo $adm->Doenca; ?></td>
              <td scope="col"><?php echo substr($adm->id_sintomas,0,50).'...'; ?></td>
              <td scope="col"><?php echo substr($adm->Descricao,0,100).'...'; ?></td>
            </tr>
        <?php
        endforeach; 
    else:
        endif;  
   break;
   // LISTAR E EDITAR
   case 'listarSintoma':
        if (listarDados("sintomas")): 
            $admin = listarDados("sintomas");
            foreach ($admin as $adm) :
            ?>
            <tr>
              <td scope="col"><?php echo $adm->id; ?></td>
              <td scope="col"><?php echo $adm->Sintoma; ?></td>
              <td scope="col"><?php echo substr($adm->primeiro_socorro, 0,100).'...'; ?></td>
              <td><a href="#" id="btn_edit" data-id="<?php echo $adm->id; ?>"><i class="icon-edit btn-lg"></i></a></td>
              <td><a href="#" id="btn_excluir" data-id="<?php echo $adm->id; ?>"><i class="icon-delete btn-lg"></i></a></td>
            </tr>

        <?php
        endforeach; 
    else:
       endif;   
   break;

   case 'listarNotificacao':
        if (listarDados("notificacao")): 
            $admin = listarDados("notificacao");
            foreach ($admin as $adm) :
            ?>
            <tr>
              <td scope="col"><?php echo $adm->id; ?></td>
              <td scope="col"><?php echo $adm->nome; ?></td>
              <td scope="col"><?php echo $adm->email; ?></td>
              <td scope="col"><?php echo $adm->mensagem; ?></td>
              <td scope="col"><?php echo $adm->classificacao; ?></td>
              <td><a href="#" id="btn_excluir" data-id="<?php echo $adm->id; ?>"><i class="icon-delete btn-lg"></i></a></td>
            </tr>
        <?php
        endforeach; 
    else:
        endif;  
    break;

   // APENAS LISTAR
     case 'listarSintoma_':
        if (listarDados("sintomas")): 
            $admin = listarDados("sintomas");
            foreach ($admin as $adm) :
            ?>
            <tr>
              <td scope="col"><?php echo $adm->id; ?></td>
              <td scope="col"><?php echo $adm->Sintoma; ?></td>
              <td scope="col"><?php echo substr($adm->primeiro_socorro, 0,100). '...'; ?></td>
            </tr>
        <?php
        endforeach; 
    else:
       endif;   
   break;

// EDITAR E ELIMINAR
     case 'listarhospital':
        if (listarDados("markers")): 
            $admin = listarDados("markers");
            foreach ($admin as $adm) :
            ?>
            <tr>
              <td scope="col"><?php echo $adm->id; ?></td>
              <td scope="col"><?php echo $adm->name; ?></td>
              <td scope="col"><?php echo $adm->address;?></td>
              <td scope="col"><?php echo $adm->lat;?></td>
              <td scope="col"><?php echo $adm->lng;?></td>
              <td><a href="#" id="btn_edit" data-id="<?php echo $adm->id; ?>"><i class="icon-edit btn-lg"></i></a></td>
              <td><a href="#" id="btn_excluir" data-id="<?php echo $adm->id; ?>"><i class="icon-delete btn-lg"></i></a></td>
            </tr>
        <?php
        endforeach; 
    else:
       endif;   
   break;

   // APENAS LISTAR
     case 'listarhospital_':
        if (listarDados("markers")): 
            $admin = listarDados("markers");
            foreach ($admin as $adm) :
            ?>
            <tr>
              <td scope="col"><?php echo $adm->id; ?></td>
              <td scope="col"><?php echo $adm->name; ?></td>
              <td scope="col"><?php echo $adm->address;?></td>
              <td scope="col"><?php echo $adm->lat;?></td>
              <td scope="col"><?php echo $adm->lng;?></td>
            </tr>
        <?php
        endforeach; 
    else:
       endif;   
   break;

  case 'form_edit_doenca': 
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
              $dados = pegaId($id,"doencas");   
            ?>
               <div class="retorno"></div>
    
        <form action="" name="form_edit_doenca" method="post" class="letraS bg-white">
            <div class="form-group">
                     <label class="text-black" for="doenca">Doença </label>
                     <input type="text" name="doenca" value="<?php echo $dados->Doenca; ?>" class="form-control" placeholder="Doença">
            </div>
           <div class="form-group">
              <label class="text-black" for="id_sintoma">Síntomas da Doença</label>
              <select multiple class="custom-select" name="id_sintoma">
                <option disabled="">Selecione</option>
                  <?php 
                        try{
                          $pdo = conecta();
                     $listar = $pdo->query("SELECT * FROM sintomas");

                      while ($linha = $listar->fetch(PDO::FETCH_ASSOC)) {
                        $sintoma =$linha["Sintoma"];
                        $exibindo =  "<option>".$sintoma."</option>";
                        echo $exibindo;
                      };

                    }catch(PDOException $e){
                    echo $e->getMessage();
                  }
            ?>
            </select>
          </div>

            <input type="hidden" name="id" value="<?php echo $dados->id; ?>">

            <div class="form-group">
               <label class="text-black" for="informacoes">Informações sobre a doença </label>
               <textarea cols="30" rows="5" name="informacoes" class="font-weight-bold form-control" placeholder="Informações"><?php echo $dados->Descricao; ?></textarea>
            </div>
           
            <img src="images/load.GIF" class="load" alt="Carregando" style="width: 180px; display: none;">
            <button type="submit" class="btn btn-primary text-white">Actualizar</button>
          
        </form>
        <?php 
              break;

        case 'form_edit_sintoma': 
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
              $dados = pegaId($id,"sintomas");   
            ?>
               <div class="retorno"></div>
    
        <form action="" name="form_edit_sintoma" method="post" class="letraS bg-white">
            <div class="form-group">
                     <label class="text-black" for="sintoma">Síntoma</label>
                     <input type="text" name="sintoma" value="<?php echo $dados->Sintoma; ?>" class="form-control" placeholder="Doença" >
            </div>

            <input type="hidden" name="id" value="<?php echo $dados->id; ?>">

            <div class="form-group">
               <label class="text-black" for="primeiro_socorro">OS Primeiros Socorros </label>
               <textarea cols="30" rows="5" name="primeiro_socorro" class="font-weight-bold form-control" placeholder="Informações"><?php echo $dados->primeiro_socorro; ?></textarea>
            </div>
           
            <img src="images/load.GIF" class="load" alt="Carregando" style="width: 180px; display: none;">
            <button type="submit" class="btn btn-primary text-white">Actualizar</button>
          
        </form>
        <?php 
              break;
               case 'form_edit_hospital': 
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
              $dados = pegaId($id,"markers");   
            ?>
               <div class="retorno"></div>
              <form action="" name="form_edit_hospital" method="post" class="letraS bg-white">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="text-black" for="nomeh">Nome do Hospital </label>
                              <input type="text" name="nomeh" value="<?php echo $dados->name; ?>" class="form-control" autocomplete="off" placeholder="Nome do Hospital">
                          </div>
                          <input type="hidden" name="id" value="<?php echo $dados->id; ?>">
                           <div class="form-group">
                             <label class="text-black" for="endereco">Província</label>
                             <input type="text" name="Provincia" value="<?php echo $dados->Provincia?>" class="form-control" autocomplete="off" placeholder="Província">
                         </div>

                       <div class="form-group">
                          <label class="text-black" for="endereco">Município</label>
                          <input type="text" name="Municipio" value="<?php echo $dados->Provincia?>" class="form-control" autocomplete="off" placeholder="Município">
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="text-black" for="lng">Longitude </label>
                              <input type="text" name="lng" value="<?php echo $dados->lng; ?>" class="form-control" autocomplete="off" placeholder="Longitude">
                          </div>
                          <div class="form-group">
                              <label class="text-black" for="lat">Latitude </label>
                              <input type="text" name="lat" value="<?php echo $dados->lat; ?>" class="form-control" autocomplete="off" placeholder="Latitude"  title="Somente letras é permitido">
                          </div>
                          <div class="form-group">
                              <label class="text-black" for="endereco">Endereço </label>
                              <input type="text" name="endereco"  value="<?php echo $dados->address; ?>" class="form-control" autocomplete="off" placeholder="Endereço do Hospital">
                          </div>
                      </div>
                  </div>
          </div>

            <img src="images/load.GIF" class="load" alt="Carregando" style="width: 180px; display: none;">
            <button type="submit" class="btn btn-primary text-white">Atualizar</button>
          
        </form>
        
        <?php 
              break;
	default:
	echo "Nada";
		break;
}
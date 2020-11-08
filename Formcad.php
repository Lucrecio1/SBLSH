<?php
// FIM DA FUNCÃO PEGAR ID
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<form id="cad_doencas" method="POST" action="ajax/controles_AD_DE.php" enctype="multipart/form-data"
      class="collapse p-1 border border-primary" style="background-color: rgba(0,0,0,0.2)"
      xmlns="http://www.w3.org/1999/html">
    <a href="#" id="fecharcad_doenca" class="btn " style="float: right; background-color: #d94808; color: white;"><i class="icon-close"></i></a>
<div id="atual">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-black ah3" for="doenca">Doença </label>
                <input type="text" name="doenca" class="form-control" autocomplete="off" placeholder="Doença">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-black ah3" for="imagem">Imagem </label>
                <input type="file" name="imagem"  class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="text-black ah3" for="id_sintoma">Síntomas da Doença</label>
        <select multiple class="form-control" name="id_sintoma">
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
     <div class="form-group">
        <label class="text-black ah3" for="id_hosptal"> Hospitais</label>
        <select multiple class="form-control" name="id_hosptal">
            <option disabled="">Selecione</option>

            <?php
            try{
                $pdo = conecta();
                $listar = $pdo->query("SELECT * FROM markers");

                while ($linha = $listar->fetch(PDO::FETCH_ASSOC)) {
                    $Hospital =$linha["name"];
                    $exibindo =  "<option>".$Hospital."</option>";
                    echo $exibindo;
                };

            }catch(PDOException $e){
                echo $e->getMessage();
            }
            ?>
        </select>
    </div>
</div>
    <div class="collapse" id="secForm">
        
           <div class="form-group">
        <label class="text-black ah3" for="informacoes">Primeiros Socorros</label>
        <textarea cols="30" rows="4" name="informacoes" autocomplete="off" class="font-weight-bold form-control" placeholder="Primeiros Socorros"></textarea>
    </div> 
    <div class="row">
    <div class="col-md-6">
     <div class="form-group">
        <label class="text-black ah3" for="informacoes">Causas</label>
        <textarea cols="30" rows="4" name="informacoes" autocomplete="off" class="font-weight-bold form-control" placeholder="Causas"></textarea>
    </div>  
        </div>
        <div class="col-md-6">
     <div class="form-group">
        <label class="text-black ah3" for="informacoes">Prevenção</label>
        <textarea cols="30" rows="4" name="informacoes" autocomplete="off" class="font-weight-bold form-control" placeholder="Prevenção"></textarea>
    </div>
</div>
</div>
    <div class="form-group">
        <label class="text-black ah3" for="informacoes">Informações da Doença</label>
        <textarea cols="30" rows="4" name="informacoes" autocomplete="off" class="font-weight-bold form-control" placeholder="Informações"></textarea>
    </div>

    </div>
    
    <input name="SendCadImg" type="submit" class="btn btn-primary text-white" value="cadastrar">
            <input type="button"  class="btn btn-primary text-white" value="outros campos" id="macapo">
            <input type="button"  class="btn btn-primary text-white collapse" value="campos anteriores" id="mencapo">
</form>
<!--CADASTRO DE ADMIN-->
<form id="cadAdmin_img" action="ajax/controles_AD_DE.php" enctype="multipart/form-data"  method="POST" class="collapse  p-1 border border-primary" style="background-color: rgba(0,0,0,0.2)">
    <div class="row">
        <div class="col-md-6">

            <div class="form-group">
                <label class="text-black ah3" for="nome">Nome Completo </label>
                <input type="text" name="nome" class="form-control" autocomplete="off" placeholder="Nome Completo" pattern="[a-zA-Z\s]+$" title="Somente letras é permitido">
            </div>
        </div>
        <div class="col-md-6">
            <a href="#" id="fecharcad_ADMINs" class="btn " style="float: right; background-color: #d94808; color: white;"><i class="icon-close"></i></a>
            <div class="form-group">
                <label class="text-black ah3" for="user">Nome de Usuário</label>
                <input type="text" name="user" class="form-control" autocomplete="off" placeholder="Nome de Usuário">
            </div>
        </div>
    </div>
    <div id="scinhide">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-black ah3" for="senha">Senha </label>
                    <input type="password" name="senha" class="form-control" autocomplete="off" placeholder="Senha">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-black ah3" for="email">Correio Electronico </label>
                    <input type="text" name="email" class="form-control" autocomplete="off" placeholder="Email" title="Digite um email válido" required="">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-black ah3" for="imagem">Imagem do Usuario </label>
                    <input type="file" name="imagem"  class="form-control" accept="image/*">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-black ah3" for="Naturalidade">Naturalidade</label>
                    <input type="text" name="Naturalidade" class="form-control" autocomplete="off" placeholder="Naturalidade" pattern="[a-zA-Z\s]+$" title="Somente letras é permitido">
                </div>
            </div>
        </div>
    </div>
    <div class="collapse" id="camposmais">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-black ah3" for="Genero">Genero</label>
                    <select  class="form-control" name="Genero">
                        <option >Masculino</option>
                        <option>Femenino</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-black ah3" for="data">Data de Nascimento</label>
                    <input type="date" name="data" class="form-control" autocomplete="off" placeholder="Data de Nascimento">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-black ah3" for="Facebook">Facebook</label>
                    <input type="text" name="Facebook" class="form-control" autocomplete="off" placeholder="Facebook">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-black ah3" for="Telefone">Número de Telefone</label>
                    <input type="text" min="0" maxlength="14" name="Telefone" class="form-control" autocomplete="off" placeholder="No Telefone" pattern="[0-9]+$" required="" title="apenas número">
                </div>
            </div>
        </div>
    </div>

    <img src="images/load.GIF" class="load" alt="Carregando" style="width: 180px; display: none;">
    <input name="Cadastrar" type="submit" class="btn btn-primary text-white" value="cadastrar">
    <input type="button"  class="btn btn-primary text-white" value="outros campos" id="maicapos">
    <input type="button"  class="btn btn-primary text-white collapse" value="campos anteriores" id="mencapos">

</form>
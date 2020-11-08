<div class="p-2">
<style>
    .corpo122{
        height:300px;
        overflow-y:auto;
        width: 100%;
    }
    .corpo122{
        display:block;
    }
</style>
<!-- crud das Doenças novas-->
<div class="row">
    <div class="col-12 col-md-12">
        <div id="notificacao" class="collapse">
             <span>
                <p class="elretorno"></p>
            <a href="#" id="fecharnot" class="btn " style="float: right; background-color: #d94808; color: white;"><i class="icon-close"></i></a>
            </span>
            <table class="table table-bordered table-striped table-responsive tabela_notificacao table-hover corpo122">
                <thead class="thead-light">
                <tr>
                    <th scope="col" style="background-color: #d94808; color: white;">Id </th>
                    <th scope="col" style="background-color: #d94808; color: white;">Nome  </th>
                    <th scope="col" style="background-color: #d94808; color: white;">Email</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Mensagem</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Classificação</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Eliminar</th>
                </tr>
                </thead>
                 <tbody>
                    <tr>
                        <td colspan="6"><img src="images/load.GIF" class="load" alt="Carregando"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-12">
        <div id="id_EditD" class="collapse ">
            <span>
                <p class="elretorno"></p>
            <a href="#" id="fechared" class="btn " style="float: right; background-color: #d94808; color: white;"><i class="icon-close"></i></a>
            </span>
            <table class="table table-bordered table-striped tabela_doenca corpo122">
                <thead class="thead-light " >
                <tr>
                    <th scope="col" style="background-color: #d94808; color: white;">Id </th>
                    <th scope="col" style="background-color: #d94808; color: white;">Doença  </th>
                    <th scope="col" style="background-color: #d94808; color: white;">Síntoma</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Informação</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Editar</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Eliminar</th>
                </tr>
                </thead>
                 <tbody class="">
                    <tr>
                        <td colspan="6"><img src="images/load.GIF" class="load" alt="Carregando"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<div class="col-12 col-md-12">
    <div id="id_Ver" class="collapse ">
        <a href="#" id="fecharver" class="btn " style="float: right; background-color: #d94808; color: white;"><i class="icon-close"></i></a>

        <table class="table table-bordered table-striped table-responsive tabela_doenca_ver corpo122">
                <thead class="thead-light">
                <tr>
                    <th scope="col" style="background-color: #d94808; color: white;">Id</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Doença</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Síntoma</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Informação</th>
                </tr>
                </thead>
                 <tbody>
                    <tr>
                        <td colspan="4"><img src="images/load.GIF" class="load" alt="Carregando"></td>
                    </tr>
                </tbody>
            </table>
    </div>
  </div>
</div>

<!-- crud dos Sintomas-->
<div class="row">
    <div class="col-12 col-md-12">
        <div id="id_Editsinto" class="collapse ">
            <p class="elretorno"></p>
            <a href="#" id="fecharedSinto" class="btn " style="float: right; background-color: #d94808; color: white;"><i class="icon-close"></i></a>

            <table class="table table-bordered table-striped tabela_sintoma corpo122">
                <thead class="thead-light">
                <tr>
                    <th scope="col" style="background-color: #d94808; color: white;">Id</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Síntoma</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Primeiros Socorros</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Editar</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Eliminar</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                     <td colspan="5"><img src="images/load.GIF" class="load" alt="Carregando"></td>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12 col-md-12">
        <div id="id_VerSinto" class="collapse ">
            <a href="#" id="fecharVerSinto" class="btn " style="float: right; background-color: #d94808; color: white;"><i class="icon-close"></i></a>
            <table class="table table-bordered table-striped table-responsive tabela_sintoma_ver corpo122">
                <thead class="thead-light">
                <tr>
                    <th scope="col"  style="background-color: #d94808; color: white;">Id</th>
                    <th scope="col"  style="background-color: #d94808; color: white;">Síntoma</th>
                    <th scope="col"  style="background-color: #d94808; color: white;">Primeiros Socorros</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                      <td colspan="5"><img src="images/load.GIF" class="load" alt="Carregando"></td>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- crud dos Hospitas-->
<div class="row">
    <div class="col-12 col-md-12">
        <div id="id_EditHosp" class="collapse ">
            <p class="elretorno"></p>
            <a href="#" id="fecharedHosp" class="btn " style="float: right; background-color: #d94808; color: white;"><i class="icon-close"></i></a>

            <table class="table table-bordered table-striped table-responsive tabela_hospital corpo122">
                <thead class="thead-light">
                <tr>
                    <th scope="col" style="background-color: #d94808; color: white;">ID</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Hospital</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Endereco</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Longitude</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Latitude</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Editar</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Eliminar</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5"><img src="images/load.GIF" class="load" alt="Carregando"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-12 col-md-12">
        <div id="id_VerHosp" class="collapse ">
            <a href="#" id="fecharverHosp" class="btn " style="float: right; background-color: #d94808; color: white;"><i class="icon-close"></i></a>

            <table class="table table-bordered table-striped table-responsive tabela_hospital_ver corpo122">
                <thead class="thead-light">
                <tr>
                    <th scope="col" style="background-color: #d94808; color: white;">ID</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Hospital</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Endereco</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Longitude</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Latitude</th>
                </tr>
                </thead>
                <tbody>
                 <tr>
                    <td colspan="5"><img src="images/load.GIF" class="load" alt="Carregando"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- crud dos Administradores-->
<div class="row ">
    <div class="col-12 col-md-12">
        <div id="id_EditAdmin" class="collapse ">
            <p class="elretorno"></p>
            <a href="#" id="fecharedAdmin" class="btn " style="float: right; background-color: #d94808; color: white;"><i class="icon-close"></i></a>

            <table class="table table-bordered table-striped table-responsive  table100 ver1 tabela corpo122">
                <thead class="thead-light">
                <tr>
                    <th scope="col" style="background-color: #d94808; color: white;">Id</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Nome</th>
                    <th scope="col" style="background-color: #d94808; color: white;">User</th>
                    <th scope="col" style="background-color: #d94808; color: white;">email</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Naturalidade</th>
                    <th scope="col" style="background-color: #d94808; color: white;">senha</th>
                    <th scope="col" style="background-color: #d94808; color: white;">imagem</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Genero</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Facebook</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Telefone</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Aniversario</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Editar</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Eliminar</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5"><img src="images/load.GIF" class="load" alt="Carregando"></td>
                    
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="col-12 col-md-12">
        <div id="id_VerAdmin" class="collapse ">
            <a href="#" id="fecharverAdmin" class="btn " style="float: right; background-color: #d94808; color: white;"><i class="icon-close"></i></a>

            <table class="table table-bordered table-striped table-responsive  tabela_ver corpo122">
                <thead class="thead-light">
                <tr>
                    <th scope="col" style="background-color: #d94808; color: white;">Id</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Nome</th>
                    <th scope="col" style="background-color: #d94808; color: white;">User</th>
                    <th scope="col" style="background-color: #d94808; color: white;">email</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Naturalidade</th>
                    <th scope="col" style="background-color: #d94808; color: white;">senha</th>
                    <th scope="col" style="background-color: #d94808; color: white;">imagem</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Genero</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Facebook</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Telefone</th>
                    <th scope="col" style="background-color: #d94808; color: white;">Aniversario</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="5"><img src="images/load.GIF" class="load" alt="Carregando"></td>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--tabelas das estatisticas-->
<div class="row">
    <div class="col-md-12" id="id_tabela1">
        <div class="row container"  style="background-color: #d94808; margin-left: 0%">
            <div class="col-md-9">
                <h5 class="card-header" style="background-color: #d94808">Visitas por cidade</h5>
            </div>
            <div class="col-md-3" >
                <select class="form-control" id="cidadev" style="width:155px;">
                    <option value="-24 hours" selected>Ultmas 24 horas</option>
                    <option value="-7 days">Ultmos 7 dias</option>
                    <option value="-15 days">Ultmos 15 dias</option>
                    <option value="-30 days">Ultmos 30 dias</option>
                </select>
            </div>
        </div>
        <table class="table table-bordered table-striped ">
            <thead>
            <tr>
                <th>Id</th>
                <th>Cidade</th>
                <th>Visitas</th>
            </tr>
            </thead>
            <tbody id="cidades">
            </tbody>
        </table>
    </div>
    <div class="col-md-12" id="id_tabela2">
            <div class="row container"  style="background-color: #d94808; margin-left: 0%">
                <div class="col-md-9">
                    <h5 class="card-header" style="background-color: #d94808">visitas por pagina</h5>
                </div>
                <div class="col-md-3" >
                    <select class="form-control" id="paginaselect" style="width:155px;">
                        <option value="-24 hours" selected>Ultmas 24 horas</option>
                        <option value="-7 days">Ultmos 7 dias</option>
                        <option value="-15 days">Ultmos 15 dias</option>
                        <option value="-30 days">Ultmos 30 dias</option>
                    </select>
                </div>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Pagina</th>
                    <th>Visitas</th>
                </tr>
                </thead>
                <tbody id="pages">
                </tbody>
            </table>
    </div>
</div>
</div>


<!-- Área dos Modais dos usuarios-->
<style>
    .dial,
    .cont {
        /* 80% of window height */
        height: 80%;
    }
    .rolagem{
        /* 100% = dialog height, 120px = header + footer */
        max-height: calc(100% - 120px);
        overflow-y: scroll;
    }
</style>

<!-- paludismo -->
<div class="modal fade" id="modal_" tabindex="-1" role="dialog">
    <div class="modal-dialog dial" role="document">
        <div class="modal-content cont">

            <div class="modal-header bg-primary">
                <?php $dados=listarDados("doencas","11");
                foreach ($dados as $doencas) :
                ?>
                <h5 class="modal-title text-white ah2"><?php echo $doencas->Doenca?></h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>

            </div>

            <div class="modal-body rolagem" data-spy="scroll" data-target="cont1">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <p class="letraS alinhar text-justify"> <?php echo $doencas->Descricao; ?> </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Febre Tifoide -->
<div class="modal fade" id="modal_1" tabindex="-1" role="dialog">
    <div class="modal-dialog dial" role="document">
        <div class="modal-content cont">

            <div class="modal-header bg-primary">
                <?php $dados=listarDados("doencas","7");
                foreach ($dados as $doencas) :
                ?>
                <h5 class="modal-title text-white ah2"><?php echo $doencas->Doenca?></h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>

            </div>

            <div class="modal-body rolagem" data-spy="scroll" data-target="cont1">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <p class="letraS alinhar text-justify"> <?php echo $doencas->Descricao; ?> </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Febre Tuberculose -->
<div class="modal fade" id="moda" tabindex="-1" role="dialog">
  <div class="modal-dialog dial" role="document">
        <div class="modal-content cont">

            <div class="modal-header bg-primary">
                <?php $dados=listarDados("doencas","27");
                foreach ($dados as $doencas) :
                ?>
                <h5 class="modal-title text-white ah2"><?php echo $doencas->Doenca?></h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>

            </div>

            <div class="modal-body rolagem" data-spy="scroll" data-target="cont1">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <p class="letraS alinhar text-justify"> <?php echo $doencas->Descricao; ?> </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_localizar" tabindex="-1" role="dialog">
    <div class="modal-dialog dial" role="document">
        <div class="modal-content cont">

            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white ah2">Localizar Hospital</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>

            </div>

            <div class="modal-body rolagem" data-spy="scroll" data-target="cont1">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 form-group">
                            <select class="custom-select" id="prov">
                                <p>Provicias-Municipios</p>
                                <option value="Viana">Luanda-Viana</option>
                                <option value="Cazenga">Luanda-Cazenga</option>
                                <option value="Belas">Luanda-Belas</option>
                                <option value="Luanda">Luanda-Luanda</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 form-group">
                             <?php
                                 try{
                          $pdo = conecta();
                          $novo= $GLOBALS['municipio'];
                     $listar = $pdo->query("SELECT * FROM markers WHERE Municipio='$novo'");

                      while ($linha = $listar->fetch(PDO::FETCH_ASSOC)) {
                        $nome ="<p>". $linha["name"]. "</p>";
                        echo $nome;

                                 };
                    }catch(PDOException $e){
                    echo $e->getMessage();
                  }
                             ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var pegar = document.getElementById("prov");
    $municipio = "Luanda";
    pegar.addEventListener("change", function(){
          municipio = this.value;
            console.log(municipio);
       
    })
</script>
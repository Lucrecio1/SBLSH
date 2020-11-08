<?php
session_start();
$Administ = filter_input(INPUT_POST, 'Cadastrar', FILTER_SANITIZE_STRING);
$SendCadImg = filter_input(INPUT_POST, 'SendCadImg', FILTER_SANITIZE_STRING);
//Credenciais de acesso ao BD
include_once"../funcoes/banco/conexao.php";
$pdo= conecta();

if($Administ):
    $nome_imagem = $_FILES['imagem']['name'];
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $Genero = filter_input(INPUT_POST, 'Genero', FILTER_SANITIZE_STRING);
    $Facebook = filter_input(INPUT_POST, 'Facebook', FILTER_SANITIZE_STRING);
    $Telefone = filter_input(INPUT_POST, 'Telefone', FILTER_SANITIZE_STRING);
    $aniversario = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
    $Naturalidade = filter_input(INPUT_POST, 'Naturalidade', FILTER_SANITIZE_STRING);
    if (empty($nome) || empty($senha) || empty($user) || empty($email) || empty($Genero) || empty($Naturalidade) || empty($nome_imagem) || empty($Telefone) || empty($aniversario) || empty($Facebook)) {
        $_SESSION['msg'] = "<p style='color:green;'>ERRO: campos vazios</p>";
        header("Location: ../admin.php");
    }
    else {
        $cadastro = $pdo->prepare("INSERT INTO tb_admin (Nome,User,senha,imagem,email,Genero,Facebook,Telefone,aniversario,Naturalidade) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $cadastro->bindValue(1, $nome, PDO::PARAM_STR);
        $cadastro->bindValue(2, $user, PDO::PARAM_STR);
        $cadastro->bindValue(3, md5(strrev($senha)), PDO::PARAM_STR);
        $cadastro->bindValue(4, $nome_imagem, PDO::PARAM_STR);
        $cadastro->bindValue(5, $email, PDO::PARAM_STR);
        $cadastro->bindValue(6, $Genero, PDO::PARAM_STR);
        $cadastro->bindValue(7, $Facebook, PDO::PARAM_STR);
        $cadastro->bindValue(8, $Telefone, PDO::PARAM_INT);
        $cadastro->bindValue(9, $aniversario, PDO::PARAM_STR);
        $cadastro->bindValue(10, $Naturalidade, PDO::PARAM_STR);
        $cadastro->execute();

        //Verificar se os dados foram inseridos com sucesso
        if ($cadastro->rowCount() > 0) {
            //Recuperar último ID inserido no banco de dados
            $ultimo_id = $pdo->lastInsertId();

            //Diretório onde o arquivo vai ser salvo
            $diretorio = '../adminIMG/' . $ultimo_id . '/';

            //Criar a pasta de foto
            mkdir($diretorio, 0755);

            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $nome_imagem)) {
                $_SESSION['msg'] = "<p style='color:green;' class='alert alert-sucess'>Administrador Cadastrado com sucesso.</p>";
                header("Location: ../admin.php");
            } else {
                $_SESSION['msg'] = "<p><span style='color:green;' class='alert alert-sucess'>Administrador Cadastrado com sucesso. </span><span style='color:red;'>Erro ao realizar o upload da imagem</span></p>";
                header("Location: ../admin.php");
            }
        }
    }

elseif($SendCadImg):
    $nome_imagem = $_FILES['imagem']['name'];
    $doenca = filter_input(INPUT_POST, 'doenca', FILTER_SANITIZE_STRING);
    $sintoma = filter_input(INPUT_POST, 'id_sintoma', FILTER_SANITIZE_STRING);
    $informacoes = filter_input(INPUT_POST, 'informacoes', FILTER_SANITIZE_STRING);

    if (empty($doenca) || empty($sintoma) || empty($informacoes) || empty($nome_imagem)) {
        $_SESSION['msg'] = "<p style='color:green;'>ERRO: campos vazios</p>";
        header("Location: ../admin.php");
    }
    else {
        $cadastro = $pdo->prepare("INSERT INTO doencas (Doenca,id_sintomas,Descricao,imagem) VALUES (?,?,?,?)");
        $cadastro->bindValue(1, $doenca, PDO::PARAM_STR);
        $cadastro->bindValue(2, $sintoma, PDO::PARAM_STR);
        $cadastro->bindValue(3, $informacoes, PDO::PARAM_STR);
        $cadastro->bindValue(4, $nome_imagem, PDO::PARAM_STR);
        $cadastro->execute();

        //Verificar se os dados foram inseridos com sucesso
        if ($cadastro->rowCount() > 0) {
            //Recuperar último ID inserido no banco de dados
            $ultimo_id = $pdo->lastInsertId();

            //Diretório onde o arquivo vai ser salvo
            $diretorio = '../images/' . $ultimo_id . '/';

            //Criar a pasta de foto
            mkdir($diretorio, 0755);

            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $nome_imagem)) {
                $_SESSION['msg'] = "<p style='color:green;'>Dodos salvo com sucesso</p>";
                header("Location: ../admin.php");
            } else {
                $_SESSION['msg'] = "<p><span style='color:green;'>Dados salvo com sucesso. </span><span style='color:red;'>Erro ao realizar o upload da imagem</span></p>";
                header("Location: ../admin.php");
            }
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados</p>";
            header("Location: ../admin.php");
        }
    }
endif;
//else{
//    $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados</p>";
//    header("Location: ../admin.php");
//}


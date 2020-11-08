<?php
ob_start(); session_start();
require '../funcoes/banco/conexao.php';
require '../funcoes/login/login.php';
require '../funcoes/crud/crud.php';
$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);

switch ($acao) :
	// REALIZA LOGIN
	case 'login':
		// Faz a interação
$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
 	if (Login($login, $senha)):
 		//CRIA A SESSÃO
		 $_SESSION['administrador'] = pegaLogin($login);
 	else:
 		$dados = pegaLogin($login);
 	if (empty($login) && empty($senha)):
 		echo "vazio";
 		elseif (!$dados):
			echo 'naoexiste';
 		elseif($dados->senha != md5(strrev($senha)) ): 
 			echo 'senhadiferente';
 		
 		endif;
 	endif;
		break;

	// REALIZA CADASTRO DO SÍNTOMA
	case 'cadastro_sintoma':
	$sintoma = filter_input(INPUT_POST, 'sintoma', FILTER_SANITIZE_STRING);
	$informacoes = filter_input(INPUT_POST, 'informacoes', FILTER_SANITIZE_STRING);
	if (empty($sintoma) || empty($informacoes)):
 		echo "vazio";
	elseif(cadastrar_sintoma($sintoma, $informacoes)):
			echo "Cadastrou";
	endif;
	break;
	//FIM

     // REALIZA CADASTRO DO HOSPITAL
	case 'cadastro_hospital':
	$nomeh = filter_input(INPUT_POST, 'nomeh', FILTER_SANITIZE_STRING);
	$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
	$Provincia = filter_input(INPUT_POST, 'Provincia', FILTER_SANITIZE_STRING);
	$Municipio = filter_input(INPUT_POST, 'Municipio', FILTER_SANITIZE_STRING);
	$Longitude = filter_input(INPUT_POST, 'lng', FILTER_SANITIZE_STRING);
	$Latitude = filter_input(INPUT_POST, 'lat', FILTER_SANITIZE_STRING);
	
	if (empty($nomeh) || empty($endereco) || empty($Longitude) || empty($Latitude)):
 		echo "vazio";
	elseif(cadastrar_hospital($nomeh, $endereco, $Provincia,$Municipio, $Longitude, $Latitude)):
			echo "Cadastrou";
	endif;
	break;
	//FIM

	// REALIZA A ACTUALIZAÇÃO DO ADMIN 
	case 'edit':
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $imagem = filter_input(INPUT_POST, 'imagem', FILTER_SANITIZE_STRING);
    $Genero = filter_input(INPUT_POST, 'Genero', FILTER_SANITIZE_STRING);
    $Facebook = filter_input(INPUT_POST, 'Facebook', FILTER_SANITIZE_STRING);
    $Telefone = filter_input(INPUT_POST, 'Telefone', FILTER_SANITIZE_STRING);
    $aniversario = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
    $Naturalidade = filter_input(INPUT_POST, 'Naturalidade', FILTER_SANITIZE_STRING);

		if(atualizar($nome,$user,$senha,$email,$imagem,$Genero,$Facebook,$Telefone,$aniversario,$Naturalidade,$id)):
			echo "atualizou";
		endif;
	break;

		// REALIZA A ACTUALIZAÇÃO DA DOENÇA 
	case 'edit_doenca':
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	$Doenca = filter_input(INPUT_POST, 'doenca', FILTER_SANITIZE_STRING);
	$id_sintoma = filter_input(INPUT_POST, 'id_sintoma', FILTER_SANITIZE_STRING);
	$informacoes = filter_input(INPUT_POST, 'informacoes', FILTER_SANITIZE_STRING);

		if(atualizar_doenca($Doenca, $id_sintoma, $informacoes,$id)):
			echo "atualizou";
		endif;
	break;

		// REALIZA A ACTUALIZAÇÃO DA DOENÇA 
	case 'edit_sintoma':
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	$sintoma = filter_input(INPUT_POST, 'sintoma', FILTER_SANITIZE_STRING);
	$primeiro_socorro = filter_input(INPUT_POST, 'primeiro_socorro', FILTER_SANITIZE_STRING);
		if(atualizar_sintoma($sintoma, $primeiro_socorro, $id)):
			echo "atualizou";
		endif;
	break;

		// REALIZA A ACTUALIZAÇÃO DO HOSPITAL
	case 'edit_hospital':
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	$nomeh = filter_input(INPUT_POST, 'nomeh', FILTER_SANITIZE_STRING);
	$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
	$Provincia = filter_input(INPUT_POST, 'Provincia', FILTER_SANITIZE_STRING);
	$Municipio = filter_input(INPUT_POST, 'Municipio', FILTER_SANITIZE_STRING);
	$Longitude = filter_input(INPUT_POST, 'lng', FILTER_SANITIZE_STRING);
	$Latitude = filter_input(INPUT_POST, 'lat', FILTER_SANITIZE_STRING);
	if(atualizar_hospital($nomeh, $endereco, $Provincia,$Municipio, $Longitude, $Latitude,$id)):
			echo "atualizou";
	endif;
	break;
	//xdiff_file_merge3(old_file, new_file1, new_file2, dest)																																						

	// REALIZA UM DELETE NA BD  DO ADMIN
	case 'excluir':
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
		if(delete($id,"tb_admin")):
			echo "deletou";
		endif;
	break;

	// REALIZA UM DELETE NA BD  DA DOENÇA 
	case 'excluir_doenca':
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
		if(delete($id,"doencas")):
			echo "deletou";
		endif;
	break;

	// REALIZA UM DELETE NA BD  DA DOENÇA 
	case 'excluir_sintoma':
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
		if(delete($id,"sintomas")):
			echo "deletou";
		endif;
	break;
	// REALIZA UM DELETE NA BD  DO HOSPITAL 
	case 'excluir_hospital':
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
		if(delete($id,"markers")):
			echo "deletou";
		endif;
	break;

		// REALIZA UM DELETE NA BD  DAS NOTIFICACOES 
	case 'excluir_notificacao':
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
		if(delete($id,"notificacao")):
			echo "deletou";
		endif;
	break;
	default:
	echo 'erro';
		break;
endswitch;

ob_end_flush();
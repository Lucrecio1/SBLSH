<?php
require '../funcoes/banco/conexao.php';
require '../funcoes/crud/crud_externo.php';

$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);

switch ($acao): 

	case 'cadastro':
	$nomeCompleto = filter_input(INPUT_POST, 'nomeCompleto', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
	$classificacao = filter_input(INPUT_POST, 'classificacao', FILTER_SANITIZE_STRING);

	if (empty($nomeCompleto) || empty($email) || empty($message) || empty($classificacao)):
 			echo "vazio";
	elseif(cadastro_sms($nomeCompleto,$email,$message,$classificacao)):
			echo "Cadastrou";
	endif;

	break;
	
	default:
		echo "NADA";
		break;
endswitch;


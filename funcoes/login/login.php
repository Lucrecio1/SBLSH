<?php
// FUNCAO DE LOGIN
function Login($login, $senha){
	$pdo = conecta();
	try{
		$logar = $pdo->prepare("SELECT * FROM tb_admin WHERE user= ? AND senha= ?");
		$logar->bindValue(1,$login,PDO::PARAM_STR);
		$logar->bindValue(2,md5(strrev($senha)) ,PDO::PARAM_STR);
		$logar->execute();

		if ($logar->rowCount() == 1):
			return TRUE;
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
	echo $e->getMessage();
}

}

// PEGA LOGIN
function pegaLogin($login){

	$pdo = conecta();
	try{
		$bylogin = $pdo->prepare("SELECT * FROM tb_admin WHERE user= ?");
		$bylogin->bindValue(1,$login,PDO::PARAM_STR);
		$bylogin->execute();

		if ($bylogin->rowCount() == 1):
			return $bylogin->fetch(PDO::FETCH_OBJ);
			//$dados['nomedocampo'];
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
	echo $e->getMessage();
}

}

// ADMINISTRADOR LOGADO

function logado($sessao){
	if (!isset($_SESSION[$sessao]) || empty($_SESSION[$sessao])):	
		header("Location: login.php");
	else:
		return TRUE;
	endif; 
}
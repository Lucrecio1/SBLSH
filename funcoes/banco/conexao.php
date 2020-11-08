<?php
// CONSTANTES
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'sist_blsh; charset=utf8') ;

// FUNCAO DE CONEXAO
function conecta(){

	$dns= "mysql:host=" . HOST . ";dbname=" . DB;
	try{
		$conn = new PDO($dns,USUARIO,SENHA);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $conn;
	}catch(PDOException $erro){
		echo $erro->getMessage();
	}
}
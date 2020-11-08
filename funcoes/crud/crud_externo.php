<?php
// FUNCAO DE CADASTRO DO CONTACTO
function cadastro_sms($nome,$email,$mensagem,$classificacao){
	$pdo = conecta();
	try{
		$cadastro = $pdo->prepare("INSERT INTO notificacao (nome,email,mensagem,classificacao) VALUES (?,?,?,?)");
		$cadastro->bindValue(1,$nome,PDO::PARAM_STR);
		$cadastro->bindValue(2,$email,PDO::PARAM_STR);
		$cadastro->bindValue(3,$mensagem,PDO::PARAM_STR);
		$cadastro->bindValue(4,$classificacao,PDO::PARAM_STR);
		$cadastro->execute();

		if ($cadastro->rowCount() > 0):
			return TRUE;
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
	echo $e->getMessage();
}

}
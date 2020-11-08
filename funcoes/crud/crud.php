<?php
// FUNCAO DE CADASTRO 

	// FUNCAO DE CADASTRO DO SÍNTOMA
	function cadastrar_sintoma($sintoma, $informacoes){
		$pdo = conecta();
		try{
			$cadastro = $pdo->prepare("INSERT INTO sintomas (Sintoma,primeiro_socorro) VALUES (?,?)");
			$cadastro->bindValue(1,$sintoma,PDO::PARAM_STR);
			$cadastro->bindValue(2,$informacoes,PDO::PARAM_STR);
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
	//FIM DA FUNCAO DE CADASTRO DO SÍNTOMA

		// FUNCAO DE CADASTRO DO HOSPITAL
	function cadastrar_hospital($nomeh, $endereco, $Provincia,$Municipio, $Longitude, $Latitude){
		$pdo = conecta();
		try{
			$cadastro = $pdo->prepare("INSERT INTO markers (name,address,Provincia,Municipio,lat,lng) VALUES (?,?,?,?,?,?)");
			$cadastro->bindValue(1,$nomeh,PDO::PARAM_STR);
			$cadastro->bindValue(2,$endereco,PDO::PARAM_STR);
			$cadastro->bindValue(3,$Provincia,PDO::PARAM_STR);
			$cadastro->bindValue(4,$Municipio,PDO::PARAM_STR);
			$cadastro->bindValue(5,$Longitude,PDO::PARAM_STR);
			$cadastro->bindValue(6,$Latitude,PDO::PARAM_STR);
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
	//FIM DA FUNCAO DE CADASTRO DO HOSPITAL
// FIM DAS FUNCÕES DE CADASTRO

// FUNÇÂO DE LISTAR 
	function listarDados($tabela){
		$pdo = conecta();
		try{
		 $listar = $pdo->query("SELECT * FROM `$tabela`");
 
			if ($listar->rowCount() > 0):
				return $listar->fetchAll(PDO::FETCH_OBJ);
			else:
				return FALSE;
			endif;

		}catch(PDOException $e){
		echo $e->getMessage();
	}
	}
// FIM DA FUNCÃO LISTAR

	// FUNÇÂO DE LISTAR 
	function Nova_Busca($sintoma){
		$pdo = conecta();
		try{
		 $listar = $pdo->query("select doencas.Doenca,doencas.Descricao,sintomas.primeiro_socorro from doencas join sintomas where doencas.id_sintomas=sintomas.Sintoma;");
 
			if ($listar->rowCount() > 0):
				return $listar->fetchAll(PDO::FETCH_OBJ);
			else:
				return FALSE;
			endif;
			 echo json_encode($listar);

		}catch(PDOException $e){
		echo $e->getMessage();
	}
	}
// FIM DA FUNCÃO LISTAR
   
// FUNÇÂO PARA PEGAR O ID
	function pegaId($id, $tabela){
		$pdo = conecta();
		try{
		 $pegaid = $pdo->prepare("SELECT * FROM `$tabela` WHERE id=?");
		 $pegaid->bindValue(1,$id,PDO::PARAM_INT);
		 $pegaid->execute();

			if ($pegaid->rowCount() > 0):
				return $pegaid->fetch(PDO::FETCH_OBJ);
			else:
				return FALSE;
			endif;

		}catch(PDOException $e){
		echo $e->getMessage();
	}
	}
// FIM DA FUNCÃO PEGAR ID

// FUNCÃO ACTUALIZAR

	// FUNCÃO EDITAR ADMIN
	function atualizar($nome,$user,$senha,$email,$imagem,$Genero,$Facebook,$Telefone,$aniversario,$Naturalidade,$id){
	$pdo = conecta();
		try{
            $editar = $pdo->prepare("UPDATE tb_admin SET Nome=?, senha=?, User=?, email=?, imagem=?, Genero=?, Facebook=?, Telefone=?, aniversario=?, Naturalidade=? WHERE id=?");
		 $editar->bindValue(1,$nome,PDO::PARAM_STR);
		 $editar->bindValue(2,md5(strrev($senha)),PDO::PARAM_STR);
		 $editar->bindValue(3,$user,PDO::PARAM_STR);
		 $editar->bindValue(4,$email,PDO::PARAM_STR);
		 $editar->bindValue(5,$imagem,PDO::PARAM_STR);
		 $editar->bindValue(6,$Genero,PDO::PARAM_STR);
		 $editar->bindValue(7,$Facebook,PDO::PARAM_STR);
		 $editar->bindValue(8,$Telefone,PDO::PARAM_INT);
		 $editar->bindValue(9,$aniversario,PDO::PARAM_STR);
		 $editar->bindValue(10,$Naturalidade,PDO::PARAM_STR);
		 $editar->bindValue(11,$id,PDO::PARAM_INT);
		 $editar->execute();

			if ($editar->rowCount() == 1):
				return TRUE;
			else:
				return FALSE;
			endif;

		}catch(PDOException $e){
		echo $e->getMessage();
	}
	}
	// FUNCÃO EDITAR DOENÇA
	function atualizar_doenca($Doenca,$id_sintoma,$informacoes,$id){
	$pdo = conecta();
		try{
		 $editar = $pdo->prepare("UPDATE doencas SET Doenca=?, id_sintomas=?, Descricao=? WHERE id=?");
		 $editar->bindValue(1,$Doenca,PDO::PARAM_STR);
		 $editar->bindValue(2,$id_sintoma,PDO::PARAM_STR);
		 $editar->bindValue(3,$informacoes,PDO::PARAM_STR);
		 $editar->bindValue(4,$id,PDO::PARAM_INT);
		 $editar->execute();
			
			if ($editar->rowCount() == 1):
				return TRUE;
			else:
				return FALSE;
			endif;

		}catch(PDOException $e){
		echo $e->getMessage();
	}
	}
	// FUNCÃO EDITAR SÍNTOMA
	function atualizar_sintoma($sintoma,$primeiro_socorro,$id){
	$pdo = conecta();
		try{
		 $editar = $pdo->prepare("UPDATE sintomas SET Sintoma=?, primeiro_socorro=? WHERE id=?");
		 $editar->bindValue(1,$sintoma,PDO::PARAM_STR);
		 $editar->bindValue(2,$primeiro_socorro,PDO::PARAM_STR);
		 $editar->bindValue(3,$id,PDO::PARAM_INT);
		 $editar->execute();
			
			if ($editar->rowCount() == 1):
				return TRUE;
			else:
				return FALSE;
			endif;

		}catch(PDOException $e){
		echo $e->getMessage();
	}
	}
		// FUNCÃO EDITAR HOSPITAL
		 	function atualizar_hospital($nomeh, $endereco, $Provincia,$Municipio, $Longitude, $Latitude, $id){
		$pdo = conecta();
		try{
			$editar = $pdo->prepare("UPDATE `markers` SET name=?, address=?,Provincia=?,Municipio=?, lng=?, lat=? WHERE id=?");
            $editar->bindValue(1,$nomeh,PDO::PARAM_STR);
			$editar->bindValue(2,$endereco,PDO::PARAM_STR);
			$editar->bindValue(3,$Provincia,PDO::PARAM_STR);
			$editar->bindValue(4,$Municipio,PDO::PARAM_STR);
			$editar->bindValue(5,$Longitude,PDO::PARAM_INT);
			$editar->bindValue(6,$Latitude,PDO::PARAM_INT);
			$editar->bindValue(7,$id,PDO::PARAM_INT);
            $editar->execute();
			
			if ($editar->rowCount() == 1):
				return TRUE;
			else:
				return FALSE;
			endif;

		}catch(PDOException $e){
		echo $e->getMessage();
	}
	}
// FIM DA FUNCÃO ACTUALIZAR

// FUNCÃO ELIMINAR
	function delete($id,$tabela){
	$pdo = conecta();
		try{
		 $deletar = $pdo->prepare("DELETE FROM `$tabela` WHERE id=?");
		 $deletar->bindValue(1,$id,PDO::PARAM_INT);
		 $deletar->execute();
			
			if ($deletar->rowCount() == 1):
				return TRUE;
			else:
				return FALSE;
			endif;

		}catch(PDOException $e){
		echo $e->getMessage();
	}
	}
// FIM DA EXCLUSÃO
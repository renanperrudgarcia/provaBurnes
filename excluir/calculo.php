<?php
//verificar se arquivo existe
if(file_exists("verificalogin.php") )
include "verificalogin.php";
else
include"../verificalogin.php";

if(isset($p[2])){
    $id =$p[2];
    

        $sql ="delete from avaliacao where id= ? limit 1";
	$consulta = $pdo->prepare($sql);
	$consulta->bindParam(1,$id);
	//verifica se foi excluido 
	if($consulta->execute()){
		$msg = "Registro excluido com Sucesso";
			mensagem($msg);
		}else{
			$msg = "Erro ao excluir registro";
			mensagem($msg);
		}
	}else{
		$msg ="Ocorreu um erro ao Excluir";
		mensagem($msg);
	}
    
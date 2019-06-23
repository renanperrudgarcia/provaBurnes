<?php
//verificar se arquivo existe
if(file_exists("verificalogin.php") )
include "verificalogin.php";
else
include"../verificalogin.php";

if(isset($p[2])){
    $id =$p[2];
    $sql ="select id from pessoa where empresa_id = ? limit 1 ";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(1,$id);
    $consulta->execute();

    $dados = $consulta->fetch(PDO::FETCH_OBJ);



    if(isset($dados->id)){
        $msg = "este registro não pode ser excluido pois existe um cliente relacionado";
        mensagem($msg);
        }

        $sql ="delete from empresa where id= ? limit 1";
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
    
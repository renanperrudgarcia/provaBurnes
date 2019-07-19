<?php
//verificar se arquivo existe
if(file_exists("verificalogin.php") )
include "verificalogin.php";
else
include"../verificalogin.php";

// verificar se os daddos foram enviados 



	//se os dados vieram por POST
	if($_POST){
        //inicar as variaveis 
        $id=$nomeFantasia=$razao=$cnpj='';
        foreach ($_POST as $key => $value) {
			
			//$key - nome do campo
            //$value - valor do campo (digitado)
           // echo"<p>$key $value</P>";
			if(isset($_POST[$key])){
				$$key  = trim($value);
			} 
        }
   

    if(empty ($id) ) {
        $sql="select id from empresa where nomeFantasia = ? limit1";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1,$nomeFantasia);
    }else{
        $sql="select id from empresa where nomeFantasia = ? and id <> ? limit 1";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1,$nomeFantasia);
        $consulta->bindParam(2,$id);

    }
    $consulta->execute();
    $dados = $consulta->fetch(PDO::FETCH_OBJ);

    //verificar se truxe alguma coisa
    if(isset($dados->id)){
        $msg="ja existe um $nomeFantasia cadastrado";
        mensagem($msg);
    }

    if(empty($id)){
        //$slq="insert into empresa(id,nomeFantasia,razao,cnpj) values (nu)";
        $sql = "call inserirempresa (null,:nomeFantasia,:razao,:cnpj)";
        $consulta= $pdo->prepare($sql);
        $consulta->bindValue(":nomeFantasia",$nomeFantasia);
        $consulta->bindValue(":razao",$razao);
        $consulta->bindValue(":cnpj",$cnpj);

    }else{
        $sql = "UPDATE empresa SET nomeFantasia = ? , razao = ?, cnpj = ? WHERE id = ?";
       
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1,$nomeFantasia);
        $consulta->bindParam(2,$razao);
        $consulta->bindParam(3,$cnpj);
        $consulta->bindParam(4,$id);
    }
    if($consulta->execute()){
        $msg = "registro inserido com sucesso!";
        $link = "listar/empresa";
        sucesso($msg, $link);
    }else{
        $msg ="Erro ao inserir/atualizar registro !";
        mensagem($msg);
    }

 }else{
    //erro
    $msg = "Erro ao efetuar requisição";
    mensagem($msg);
}
    


?>

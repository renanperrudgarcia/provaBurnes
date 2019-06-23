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
        $id=$data=$peso=$altura=$imc=$avaliador=$cliente_id=$classificacao_id='';
        foreach ($_POST as $key => $value) {
			
			//$key - nome do campo
            //$value - valor do campo (digitado)
           // echo"<p>$key $value</P>";
			if(isset($_POST[$key])){
				$$key  = trim($value);
			} 
        }
      

    

    if(empty($id)){
        
        $sql = "INSERT INTO avaliacao (id, peso, altura, imc, avaliador, pessoa_id) VALUES (NULL,:peso,:altura,:imc,:avaliador,:cliente_id)";
        $consulta= $pdo->prepare($sql);
       
        $consulta->bindValue(":peso",$peso);
        $consulta->bindValue(":altura",$altura);
        $consulta->bindValue(":imc",$imc);
        $consulta->bindValue(":avaliador",$avaliador);
        $consulta->bindValue(":cliente_id",$cliente_id);
       
    }
    if($consulta->execute()){
        $msg = "registro inserido com sucesso!";
        $link = "listar/calculo";
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

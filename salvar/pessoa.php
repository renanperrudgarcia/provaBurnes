<?php
//verificar se arquivo existe
if(file_exists("verificalogin.php") )
include "verificalogin.php";
else
include"../verificalogin.php";

// verificar se os daddos foram enviados 



    //se os dados vieram por POST
    
    $pdo->beginTransaction();
	if($_POST){
        //inicar as variaveis 
        $id=$nome=$sexo=$datanascimento=$login=$senha=$redigite=$tipo=$capa="";
        foreach ($_POST as $key => $value) {
			
			//$key - nome do campo
            //$value - valor do campo (digitado)
            //echo"<p>$key $value</P>";
			if(isset($_POST[$key])){
				$$key  = trim($value);
			} 
        }
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $datanascimento = formataData( $datanascimento );
        
    
    if ( empty ( $id ) ) {

        //adicionar um nome de foto de capa
        $capa = time();

        //insert
        $sql = "insert into pessoa 
        (id, nome,sexo, datanascimento, login, senha, tipo, foto,empresa_id)
        values 
        (NULL, :nome, :sexo, :datanascimento, :login, :senha, :tipo, :capa, :empresa_id)";

        $consulta = $pdo->prepare( $sql );
        $consulta->bindValue(":nome",$nome);
        $consulta->bindValue(":sexo",$sexo);
        $consulta->bindValue(":datanascimento",$datanascimento);
        $consulta->bindValue(":login",$login);
        $consulta->bindValue(":senha",$senha);
        $consulta->bindValue(":tipo",$tipo);
        $consulta->bindValue(":capa",$capa);
        $consulta->bindValue(":empresa_id",$empresa_id);
    } else {
        //update
        $sql = "update pessoa  set nome=:nome, sexo = :sexo, datanascimento = :datanascimento, login = :login, senha = :senha, tipo = :tipo, capa=:capa,empresa = :empresa where id =:id limit 1" ; 

        $consulta = $pdo->prepare( $sql );
        $consulta->bindValue(":nome",$nome);
        $consulta->bindValue(":sexo",$sexo);
        $consulta->bindValue(":datanascimento",$datanascimento);
        $consulta->bindValue(":login",$login);
        $consulta->bindValue(":senha",$senha);
        $consulta->bindValue(":tipo",$tipo);
        $consulta->bindValue(":capa",$capa);
        $consulta->bindValue(":empresa_id",$empresa_id);
        $consulta->bindValue(":id",$id);

    }

    //executar
    if ( $consulta->execute() ) {


			

        if ( !empty ( $_FILES["capa"]["name"] ) ) {
            echo $_FILES["capa"]["name"];
            //copiar o arquivo para a pasta

            if ( !copy( $_FILES["capa"]["tmp_name"], 
                "foto/".$_FILES["capa"]["name"] )) {

                $msg = "Erro ao copiar foto";
                mensagem( $msg );
            }

            //echo $capa;

            $pastaFotos = "foto/";
            $imagem = $_FILES["capa"]["name"];

            redimensionarImagem($pastaFotos,$imagem,$capa);
        }
        
        //salvar no banco
        $pdo->commit();

        $msg = "Registro inserido com sucesso!";
        sucesso( $msg, "listar/quadrinho" );

    } else {
        //erro do sql
        echo $consulta->errorInfo()[2];
        exit;
        $msg = "Erro ao salvar quadrinho";
        mensagem( $msg );
    }


} else {
    //se não foi veio do formulario
    $msg = "Requisição inválida";
    mensagem( $msg );
}


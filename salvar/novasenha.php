<?php
//verificar se arquivo existe
if(file_exists("verificalogin.php") )
include "verificalogin.php";
else
include"../verificalogin.php";

$senha1=$novasenha=$regedit="";
foreach ($_POST as $key => $value) {
			
    //$key - nome do campo
    //$value - valor do campo (digitado)
    //echo"<p>$key $value</P>";
    if(isset($_POST[$key])){
        $$key  = trim($value);
    } 
}
 

 $login=($_SESSION["pessoa"]["login"]) ;
 $id=($_SESSION["pessoa"]["id"]) ;

 $sql="select id,senha from pessoa where id = ? limit 1";
 $consulta = $pdo->prepare($sql);
 $consulta->bindParam(1, $id);
 $consulta->execute();
 $consulta->execute();
    $dados = $consulta->fetch(PDO::FETCH_OBJ);

 

 

 if( !password_verify ($senha1, $dados->senha) ){
       
    $msg = "senha invalida";
    mensagem($msg);
}



else{
    $novasenha = password_hash($novasenha, PASSWORD_DEFAULT);
    $sql = "update pessoa  set senha=:senha where id=:id";
    $consulta = $pdo->prepare( $sql );
    $consulta->bindValue(":senha",$novasenha);
    $consulta->bindValue(":id",$id);

    //echo "<script>location.href='cadastros/calculo'</script>";
}
if($consulta->execute()){
    $msg = "Senha alterada com sucesso!";
    $link = "cadastros/calculo";
    sucesso($msg, $link);
}else{
    $msg ="Erro ao alterar senha !";
    mensagem($msg);
}
?>
?>
 ?>*/
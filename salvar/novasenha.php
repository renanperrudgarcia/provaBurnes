<?php
//verificar se arquivo existe
if(file_exists("verificalogin.php") )
include "verificalogin.php";
else
include"../verificalogin.php";

    if($_POST){
        
    }

 $login=($_SESSION["pessoa"]["login"]) ;

 $sql="select senha from pessoa where login = ? limit 1";
 $consulta = $pdo->prepare($sql);
 $consulta->bindParam(1, $login);
 $consulta->execute();

 

 if( !password_verify ($senha, $dados->senha) ){
       
    $msg = "senha invalida";
    mensagem($msg);
}else{
    echo "<script>location.href='cadastros/calculo'</script>";
}
?>
?>
 ?>
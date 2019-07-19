<?php
//verificar se arquivo existe
if(file_exists("verificalogin.php") )
include "verificalogin.php";
else
include"../verificalogin.php";

 $login=($_SESSION["pessoa"]["login"]) ;

 $sql="select senha from pessoa where login = ? limit 1";
 $consulta = $pdo->prepare($sql);
 $consulta->bindParam(1, $login);
 $consulta->execute();

 

 ?>
    
    <form name="formsenha" method="post" action="salvar/novasenha" data-parsley-validate>
				
                <label for="senha1">Digite sua senha: </label>
				<input type="password" name="senha1" class="input" placeholder="Digite sua senha"
				required
				data-parsley-required-message="<i class='fas fa-info-circle'></i> Por favor preencha este campo">
                
                
                <br>
                <br>
                <label for="novasenha">Digite nova Senha : </label>
				<input type="password" name="novasenha" class="input" placeholder="Digite sua nova  senha"
				required
				data-parsley-required-message="<i class='fas fa-info-circle'></i> Por favor preencha este campo">
                <br>
                <br>

                <label for="redigite">redigite a  nova Senha : </label>
				<input type="password" name="redigite" class="input" placeholder="redigite sua nova  senha"
				required
				data-parsley-required-message="<i class='fas fa-info-circle'></i> Por favor preencha este campo">
                <br>
                <br>

				<button type="submit" class="btn btn-danger" onclick="return validarSenha()">
					<i class="fas fa-check"></i> 
					alterar senha
				</button>
            </form>
            
            
            
            <script type="text/javascript">
         function validarSenha(){

            var novasenha = formsenha.novasenha.value;
            var redigite = formsenha.redigite.value;
            if(redigite== "" || redigite.length <= 3){
                alert ('Preencha o campo da senha com no minimo 4 caracteres');
                formsenha.redigite.focus();
                return false;
            }
    
            if(novasenha == "" || novasenha.length <= 3){
                alert ('Preencha o campo da senha com no minimo 4 caracteres');
                formsenha.novasenha.focus();
                return false;
            }
            if(novasenha != redigite){
                alert (' Senhas estao diferentes');
                formsenha.novasenha.focus();
                return false;
            }
        }
         </script>
            
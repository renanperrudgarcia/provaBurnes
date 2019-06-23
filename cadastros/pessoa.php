<?php
	//verificar se o arquivo existe
	if ( file_exists ( "verificalogin.php" ) )
		include "verificalogin.php";
	else
		include "../verificalogin.php";

        $id=$nome=$sexo=$datanascimento=$login=$senha=$redigite=$tipo=$empresa_id="";

        if(isset($p[2] ) ){
            $sql="select * ,date_format(datanascimento, '%d/%m/%Y') datanascimento  from pessoa where id= ? limit 1";
            $consulta = $pdo->prepare($sql);
            $consulta->bindParam(1,$p[2]);
            $consulta->execute();
    
            $dados= $consulta->fetch(PDO::FETCH_OBJ);
            $id                 = $dados->id;
            $nome               = $dados->nome;
            $sexo               = $dados->sexo;
            $datanascimento     = $dados->datanascimento;
            $login              = $dados->login;
            $tipo               = $dados->tipo;
            $empresa_id         = $dados->empresa_id;

            
    
        }
        
?>
<div class="container">
	<div class="coluna">
		<h1 class="float-left">Cadastro de Pessoas</h1>

		<div class="float-right">
		

			<a href="listar/pessoa" class="btn btn-info">
				<i class="fas fa-search"></i> Listar
			</a>
		</div>

		<div class="clearfix"></div>

		<form name="cadastro" method="post" action="salvar/pessoa" data-parsley-validate>
        <div class="form-grup">
			<label for="id">ID:</label>
			<input type="text" name="id" 
			class="form-control" readonly
            value="<?=$id;?>">
            </div>

            <br>
            <div class="form-grup">
			<label for="nome">Nome :</label>
			<input type="text" name="nome" required
			class="form-control"
			data-parsley-required-message="Preencha este campo"
            value="<?=$nome;?>">
            </div>

            <br>
            <div class="form-grup">
			<label for="sexo">Sexo:</label>
			<select  name="sexo" id="sexo" class="form-control" required  data-parsley-required-message="Preencha este campo">
            <option value=""></option>
            <option value="m">Masculino</option>
            <option value="f">Feminino</option>
            </select>
            </div>
			

            <br>
            <div class="form-grup">
			<label for="datanascimento">Data de Nascimento:</label>
			<input type="text" name="datanascimento" required
			class="form-control" data-mask="99/99/9999"
			data-parsley-required-message="Preencha este campo"
			value="<?=$datanascimento;?>">
            </div>
			

            <br>
            <div class="form-grup">
			<label for="login">Login:</label>
			<input type="text" name="login" required
			class="form-control" 
			data-parsley-required-message="Preencha este campo"
            value="<?=$login;?>">
            </div>

			

            <br>
            <div class="form-grup">
			<label for="senha">Senha:</label>
			<input type="password" name="senha" id="senha" required
			class="form-control"
            data-parsley-required-message="Preencha este campo">
            </div>

            <br>
            <div class="form-grup">
			<label for="redigite">Redigite a Senha:</label>
			<input type="password" name="redigite" required
			class="form-control"
            data-parsley-required-message="Preencha este campo">
            </div>
            

            <br>
            <div class="form-grup">
            <label for="tipo">Tipo:</label>
			<select  name="tipo" id="sexo" class="form-control" required  data-parsley-required-message="Selecione uma Opção">
            <option value=""></option>
            <option value="f">Funcionario</option>
            <option value="c">Cliente</option>
            </select>
            </div>
			
            <br>
            <div class="form-grup">
			<label for="capa">Foto da Capa (JPG):</label>
			<input type="file" name="capa"
			class="form-control"
			
			accept=".jpg">
            </div>
			
            <br>
            <div class="form-grup">
            
            <br>
			<label for="empresa_id">Empresa:</label>
			<select name="empresa_id" id="empresa_id"
			class="form-control"
			required 
			data-parsley-required-message="Selecione uma opção">
				<option value=""></option>
				<?php
					//tabela para selecionar os dados
					$tabela = "empresa";
					//nome do campo que será carregado
					$campo = "nomeFantasia";
					//função para buscar os tipos
					carregarOpcoes($tabela,$campo,$pdo);
					//$pdo - conexao com o banco de dados
				?>
            </select>
        
            <br>
            
			<button type="submit" class="btn btn-success" onclick="return validarSenha()">
				<i class="fas fa-check"></i> Gravar
			</button>

		</form>

	</div>
</div>

<script type="text/javascript">

    $("#sexo").val(<?=$sexo;?>);
    $("#tipo").value(<?=$tipo;?>);
    
    $("#empresa_id").val(<?=$empresa_id;?>);
   

	function validaCpf(cpf) {
		$.get("validacpf.php",{cpf:cpf},function(dados){

			if ( dados != 1 ) {
				//mensagem de erro
				alert(dados);
				//apagar o cpf
				$("#cpf").val("");
			}

		})
	}

    function validarSenha(){

        var senha = cadastro.senha.value;
        var redigite = cadastro.redigite.value;
        if(redigite== "" || redigite.length <= 3){
            alert ('Preencha o campo da senha com no minimo 4 caracteres');
            cadastro.redigite.focus();
            return false;
        }

        if(senha == "" || senha.length <= 3){
            alert ('Preencha o campo da senha com no minimo 4 caracteres');
            cadastro.senha.focus();
            return false;
        }
        if(senha != redigite){
            alert (' Senhas estao diferentes');
            cadastro.senha.focus();
            return false;
        }
    }

   
</script>
<?php
	
	//verificar se arquivo existe
	if(file_exists("verificalogin.php") )
		include "verificalogin.php";
	else
		include"../verificalogin.php";
	$id=$nomeFantasia=$razao=$cnpj='';
	
	
    
    if(isset($p[2] ) ){
        $sql="select * from empresa where id= ? limit 1";
        $consulta = $pdo->prepare($sql);
		$consulta->bindParam(1,$p[2]);
		$consulta->execute();

        $dados= $consulta->fetch(PDO::FETCH_OBJ);
        $id             = $dados->id;
        $nomeFantasia   = $dados->nomeFantasia;
        $razao          = $dados->razao;
        $cnpj           = $dados->cnpj;
        

    }
		
		?>
	<div class="container">
		<div class="coluna">
			<h1 class="float-left"> Cadastro de Empresa</h1>
			<div class="float-right">
			
			<a href="listar/empresa" class="btn btn-info">
			<i class="fas fa-search"></i>  Listar
			</a>
		</div>
		<div class="clearfix"></div>
		
		<form name="cadastro" method="post" action="salvar/empresa" data-parsley-validate>
			<label for="id" >ID</label>
			<input type="text" name="id" class="form-control" readonly value="<?=$id;?>">
			<label for="nomeFantasia">Nome Fantasia</label>
			<input type="text" name="nomeFantasia" required class="form-control" data-parsley-required-message="<i class='fas fa-info-circle'></i> Prencha este Campo" value="<?=$nomeFantasia;?>">
			<label for="razao">Razão Social </label>
			<input type="text" name="razao" required class="form-control" data-parsley-required-message="<i class='fas fa-info-circle'></i> Prencha este Campo" value="<?=$razao;?>">
            <br>
            <label for="cnpj">CNPJ:</label>
			<input type="text" name="cnpj" id="cnpj" required
			class="form-control" data-mask="99.999.999/9999-99"
			data-parsley-required-message="Preencha este campo"
            value="<?=$cnpj;?>" onblur="validaCnpj( this.value )">
            <br>
            
            <button type="submit" class="btn btn-success">

           
				<i class="fas fa-check"></i>Gravar
			</button>
		</form>

		</div>
		
    </div>
    

   

   
    <script type="text/javascript">
	function validaCnpj( cnpj ) {
		$.get( "validacnpj.php",{cnpj:cnpj},function( dados ) {

			if ( dados != 1 ) {
				
				alert( dados );
				
				$("#cnpj").val("");
			}

		})
	}

    
</script>   

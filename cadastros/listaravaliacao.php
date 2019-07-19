<?php
  //require_once 'Calc.php';
  
 

 ///$calculo = new Calc;
 
// $id=$data=$peso=$altura='';



?>

<div class="container">
	<pre>
		
	</pre>
	<div class="text-center- danger mt-5 "></div>
	<h1 class="text-center">Selecione Cliente
	
			</h1>
	

<form  name="cadastros"action="listar/avaliacoes" method="post">
	
	
			
	<?php
			if ($_SESSION["pessoa"]["tipo"] == 'funcionario') {

			$idavaliador=$_SESSION["pessoa"]["id"];

			?>
			
	<div class="form-grup">
					<label for="cliente_id">Selecione o Cliente: </label>
						<select name="cliente_id" id="nome" class="form-control" required data-parsley-required-message="Selecione um personagem" >
								<option value="">Selecione um Cliente</option>
									<?php
									//chamar a função para mostras as opções 

									$tabela	=	"pessoa";
									$campo	=	"nome";
									carregarOpcoes($tabela,$campo,$pdo);
									?>
								</option>
							</select>
					
	</div>
			<?php
		//fecha o if
		}else{
			$idavaliador=$cliente=$_SESSION["pessoa"]["id"];
			
		
		?>
		<div class="form-grup">
					<label for="cliente_id">Selecione o Cliente: </label>
						<select name="cliente_id"  class="form-control" required data-parsley-required-message="Selecione um personagem" readonly>
								<option value="<?=$_SESSION["pessoa"]["id"];?>"><?=$_SESSION["pessoa"]["nome"];?></option>
								
								
								</option>
							</select>
					
	</div>
	<?php
		}
	?>

		<br>
	
	<br>
	<button type="submit" name="enviar" class="btn btn-success">Listar </button>
         
 


</form>
</div>



<script type="text/javascript">

$("#altura").maskMoney({
			thousands:".",
			decimal:","
		});
$("#nome").val(<?=$cliente;?>);

</script>
<?php
  //require_once 'Calc.php';
  
 

 ///$calculo = new Calc;
 
 $id=$data=$peso=$altura='';



?>

<div class="container">
	<pre>
		
	</pre>
	<div class="text-center- danger mt-5 "></div>
	<h1 class="text-center">Avaliações
	<div class="float-right">
			<a href="cadastros/listaravaliacao" class="btn btn-info">
			<i class="fas fa-search"></i>  Listar
			</a>
			
	</div>
			</h1>
	

<form  name="cadastros"action="salvar/calculo" method="post">
	
	<div class="form-grup">
			<label>ID:</label>
			<input type="text" name="id" value="<?=$id?>" class="form-control " required readonly >
	</div>

	<br>
			
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
	<div class="form-grup">
		<label>Peso:</label>
		<input type="text" name="peso" value="<?=$peso?>" class="form-control " required >
	</div>
	<br>	
	<div class="form-grup">
		<label>Altura: </label>
		<input type="text" name="altura" id="altura" value="<?=$altura?>" class="form-control " required data-mask="9.99"  >
	</div>
	<div class="form-grup d-none">
					<label for="avaliador">avaliador: </label>
						<select name="avaliador" id="avaliador" class="form-control" required data-parsley-required-message="Selecione um personagem" readonly>
								<option value="<?=$idavaliador;?>"><?=$_SESSION["pessoa"]["nome"];?></option>
								
								
								</option>
							</select>
					
	</div>
	<br>
	<br>
	<button type="submit" name="enviar" class="btn btn-success">Calcular Imc</button>
         
 


</form>
</div>



<script type="text/javascript">

$("#altura").maskMoney({
			thousands:".",
			decimal:","
		});
$("#nome").val(<?=$cliente;?>);

</script>
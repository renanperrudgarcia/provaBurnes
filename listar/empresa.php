<?php
    //verificar se arquivo existe
    if(file_exists("verificalogin.php") )
    include "verificalogin.php";
    else
    include"../verificalogin.php";

?>
    <div class="container">
		<div class="coluna pr-5px">
			<h1 class="text-center">Listagem das Empresas
				<a href="cadastros/empresa" class="btn btn-success float-right    ">
			<i class="fas fa-file"></i>  Novo
			</a>
			</h1>
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<td width="5%">ID</td>
						<td width="25%">NomeFantasia</td>
                        <td width="25%">Razão Social</td>
                        <td width="25%">CNPJ</td>
						<td>Opções</td>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "select * from empresa order by nomeFantasia";
					$consulta =$pdo->prepare( $sql);
					$consulta->execute();
					while($linha = $consulta->fetch(PDO::FETCH_OBJ)){
						$id 	        = $linha->id;
						$nomeFantasia 	= $linha->nomeFantasia;
                        $razao	        = $linha->razao;
                        $cnpj            = $linha->cnpj;
						echo "<tr>
								<td>$id</td>
								<td>$nomeFantasia</td>
                                <td>$razao</td>
                                <td>$cnpj</td>
                                
								<td>
								<a href='cadastros/empresa/$id'class='btn btn-success m-0 ml-3'>
								<i class='fas fa-edit'></i>
								</a>
								<a href='javascript:excluir($id)'class='btn btn-danger m-0  ml-2'>
								<i class='fas fa-trash'>
								</i>
								</a>
								</td>
							</tr>
							";
					}

					?>
				</tbody>
			</table>
		</div>
	</div>
	<script type="text/javascript">
		function excluir(id) {
			if(confirm("Deseja mesmo excluir? Tem certeza?")){
				location.href = "excluir/empresa/"+id;
			}
		}
		$(document).ready( function () {
	    $('.table').DataTable( {
        "language": {
            "lengthMenu": "Mostrar _MENU_ resultados por página",
            "zeroRecords": "Nenhum registro encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrando de _MAX_ em um total de registros)",
            "search":"Buscar",
            "Previous":"Anterior"
        }
    });
	} );

       
		
	</script>



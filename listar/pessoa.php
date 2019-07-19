<?php
    //verificar se arquivo existe
    if(file_exists("verificalogin.php") )
    include "verificalogin.php";
    else
    include"../verificalogin.php";
    if ($_SESSION["pessoa"]["tipo"] == 'funcionario') {
        $entrada="";
        
    }else{
        $entrada="none";
        
       
        
        

    }

?>
    <div class="container">
		<div class="coluna pr-5px">
			<h1 class="text-center">Listagem de Pessoas
				<a href="cadastros/pessoa" class="btn btn-success float-right   ">
			<i class="fas fa-file"></i>  Novo
			</a>
			</h1>
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<td width="5%">ID</td>
						<td width="20%">Nome</td>
                        <td width="7%">Sexo</td>
                        <td width="10%">Data Nascimento</td>
                        <td width="10%">login</td>
                        <td width="10">tipo</td> 
                        <td width="15%">Empresa</td>
                       
                       
						<td style="display:<?=$entrada;?>">Opções</td>
					</tr>
				</thead>
			<tbody>
            <?php
					
                    if ($_SESSION["pessoa"]["tipo"] == 'funcionario') {
                        
                        $sql = "select p.id,p.nome,p.sexo, date_format(p.datanascimento, '%d/%m/%Y') datanascimento,p.login,p.tipo,e.nomeFantasia from pessoa as p INNER join empresa as e
                        on p.empresa_id = e.id
                        order by nome";
                                    $consulta =$pdo->prepare( $sql);
                       
                    }
                    
					$consulta->execute();
					while($linha = $consulta->fetch(PDO::FETCH_OBJ)){
						$id 	                = $linha->id;
						$nome   	            = $linha->nome;
                        $sexo	                = $linha->sexo;
                        $datanascimento         = $linha->datanascimento;
                        $login                  = $linha->login;
                        $tipo                   = $linha->tipo;
                        $nomeFantasia               = $linha->nomeFantasia;
                        

                        echo "<tr>
                        <td>$id</td>
                        <td>$nome</td>
                        <td>$sexo</td>
                        <td>$datanascimento</td>
                        <td>$login</td>
                        <td>$tipo</td>
                        <td>$nomeFantasia</td>
                        
                        <td>
                        <a href='cadastros/pessoa/$id'class='btn btn-success m-0 ml-3'>
                        <i class='fas fa-edit'></i>
                        </a>
                        <a href='javascript:excluir($id)'class='btn btn-danger m-0 ml-2'>
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
                location.href = "excluir/pessoa/"+id;
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

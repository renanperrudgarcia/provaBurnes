<?php
    //verificar se arquivo existe
    if(file_exists("verificalogin.php") )
    include "verificalogin.php";
    else
    include"../verificalogin.php";
    //VERIFICA SE E USUARIO OU FUNCIONARIO 
		if ($_SESSION["pessoa"]["tipo"] == 'f') {
			$entrada="";
			
		}else{
			$entrada="none";
			
		   if($_POST){
            $cliente_id = $_POST["cliente_id"];
           }
			
			
	
        }
        if($_POST){
            $cliente_id = $_POST["cliente_id"];
           }

?>
    <div class="container">
		<div class="coluna pr-5px">
			<h1 class="text-center" name="listar">Listagem das Avaliações
				<a href="cadastros/calculo" class="btn btn-success float-right   ">
			<i class="fas fa-file"></i>  Novo
			</a>
			</h1>
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<td width="5%">ID</td>
						<td width="25%">Nome</td>
                        <td width="7%">Peso</td>
                        <td width="7%">Altura</td>
                        <td width="7%">Imc</td>
                        <td width="10">Sexo</td> 
                        <td width="10%">Idade</td>
                        <td width="10%">Avaliador</td>
                        <td width="20%" >Classificação</td>
                       
						<td style="display:<?=$entrada;?>">Opções</td>
					</tr>
				</thead>
			<tbody>
            <?php

                    
					
                    if ($_SESSION["pessoa"]["tipo"] == 'f') {
                        
                        $sql = "SELECT a.id, p.nome,a.peso,a.altura, a.imc,p.sexo, (SELECT TIMESTAMPDIFF(YEAR,p.datanascimento,a.data) ) as idade,pp.nome as avaliador,
                        (case 
                                                when a.imc <=18.5 then 'Abaixo do peso' 
                                                when a.imc BETWEEN 18.6 and 24.9 then 'Peso ideal' 
                                                when a.imc BETWEEN 25.0 and 29.9 then 'Levemente acima do peso' 
                                                when a.imc BETWEEN 30.0 and 34.9 then 'Obesidade grau 1' 
                                                when a.imc BETWEEN 35.0 and 39.9 then 'Obesidade grau 2 (Severa)' 
                                                when a.imc >=40.0 then 'Obesidade grau 3 (Mórbida)' 
                                            end) as classificacao
                                           
                        from avaliacao as a, pessoa as p, pessoa as pp
                        WHERE 
                       
                        a.pessoa_id = p.id
                        AND
                        a.avaliador = pp.id 
                        AND a.pessoa_id = :cliente_id ";
                        $consulta = $pdo->prepare( $sql);
                        $consulta->bindValue(":cliente_id",$cliente_id);
                    }else{
                        $entrada="none";
                        $botao="";
                       
                       
                        $sql = "SELECT a.id, p.nome,a.peso,a.altura, a.imc,p.sexo, (SELECT TIMESTAMPDIFF(YEAR,p.datanascimento,a.data) ) as idade,p.nome as avaliador,
                        (case 
                                                when a.imc <=18.5 then 'Abaixo do peso' 
                                                when a.imc BETWEEN 18.6 and 24.9 then 'Peso ideal' 
                                                when a.imc BETWEEN 25.0 and 29.9 then 'Levemente acima do peso' 
                                                when a.imc BETWEEN 30.0 and 34.9 then 'Obesidade grau 1' 
                                                when a.imc BETWEEN 35.0 and 39.9 then 'Obesidade grau 2 (Severa)' 
                                                when a.imc >=40.0 then 'Obesidade grau 3 (Mórbida)' 
                                            end) as classificacao
                                           
                        FROM 
                        avaliacao as a inner join pessoa as p on a.pessoa_id = p.id and a.pessoa_id= :id ";
                         $consulta =$pdo->prepare( $sql);
                         $consulta->bindValue(":id",$_SESSION["pessoa"]["id"]);
                        
                        
                
                    }
                    
					$consulta->execute();
					while($linha = $consulta->fetch(PDO::FETCH_OBJ)){
						$id 	         = $linha->id;
						$nome   	     = $linha->nome;
                        $peso	         = $linha->peso;
                        $altura          = $linha->altura;
                        $imc             = $linha->imc;
                        $sexo            = $linha->sexo;
                        $idade           = $linha->idade;
                        $avaliador       = $linha->avaliador;
                        $classificacao   = $linha->classificacao;

                        //se for funcionario aparece botao excluir
                        if ($_SESSION["pessoa"]["tipo"] == 'funcionario') {
                            $botao ="<td >
								
                            <a href='javascript:excluir($id)'class='btn btn-danger m-0'>
                            <i class='fas fa-trash'>
                            </i>
                            </a>
                            </td>
                        </tr>";
                    }

                        
                       
						echo "<tr>
								<td>$id</td>
								<td>$nome</td>
                                <td>$peso</td>
                                <td>$altura</td>
                                <td>$imc</td>
                                <td>$sexo</td>
                                <td>$idade</td>
                                <td>$avaliador</td>
                                <td>$classificacao</td>

                               
                                $botao
                                
                               
                               
			

			
                        
                        
								
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
				location.href = "excluir/calculo/"+id;
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



					
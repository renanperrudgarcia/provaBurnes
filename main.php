
<?php
 if(!isset ($pagina) ){
 	header("Location: index.php");

 }
?>
<header>
	<nav class="navbar navbar-expand-lg fixed-top bg-danger">
	  
	 
 		
	  <div class="collapse navbar-collapse" id="menu">
	    <ul class="navbar-nav ml-auto">
			<li class="nav-item"> 
			<a class="nav-link" href="cadastros/calculo">
			<i class="fas fa-calculator"></i>  Calcular Imc
			</a>
			</li>
			<li class="nav-item"> 
			<a class="nav-link" href="cadastros/listaravaliacao">
			<i class="fas fa-list-ul"></i>  Listar Avaliações
			</a>
			</li>
	      <?php
			if ($_SESSION["pessoa"]["tipo"] == 'funcionario') {
			$menu='<li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          <i class="fas fa-edit"></i> Cadastros
	        </a>
	        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
	          <a class="dropdown-item text-danger" href="cadastros/pessoa">Pessoa</a>
	          <a class="dropdown-item text-danger" href="cadastros/empresa">empresa</a>
	         
	          
	        </div>
	      
	      
	      </li>';
			
		  
		}else{
			$menu="";
		}
		echo $menu;
		?>
	    
	    
	      <li class="nav-item menu dropdown mt-3">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          
	          Olá <?=$_SESSION["pessoa"]["nome"];?>
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          
	          <a class="dropdown-item" href="cadastros/novasenha">Mudar senha</a>
	          <a class="dropdown-item" href="sair.php">Sair do Sistema</a>
	        </div>
	      </li>
	    </ul>
	    
	  </div> 
	</nav>
</header>
<main>

	<div class="container">
		<?php

			if ( file_exists ( $pagina ) )
			 include $pagina;
			else include "erro.php";

		?>
	</div>

	
</main>
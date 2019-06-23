<?php
	//verificar se exite uma variavel $pagina
	if(!isset($pagina)){
		header("location: index.php");
	}
	?>
	<dir class="container">
		<h1 class="text-center"> Página não Encontrada</h1>
		<p class="text-center">
		A Página que está tentando acessar não exite!
	</p>
	</dir>
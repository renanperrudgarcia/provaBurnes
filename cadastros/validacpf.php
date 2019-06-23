<?php
	//incluir o qrquivo da funcao
	include"funcoes.php";

	$cpf="";
	if(isset($_GET["cpf"]) ){
		$cpf 	= trim ($_GET["cpf"]);
	}
	//verifica se cpf e valido 

	if(empty($cpf) ) {
		echo "forneça um CPF";
		exit;
	}elseif ($cpf=="123.456.789-09") {
		echo "CPF invalido";
		exit;
	}

	//executar a função 
	echo validacpf($cpf);
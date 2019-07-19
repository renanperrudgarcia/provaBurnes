<?php
	//iniciar a sessao
	session_start();
	//configurar para serem mostrados os erros do php 
	ini_set("display_error",1);
	ini_set("display_startup_errors",1);
	error_reporting(E_ALL);

	// incluir a conexao com o banco e as funcoes 
	include "conexao.php";
	include "funcoes.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Prova 2 Semestre</title>
	<meta charset="utf-8">

	<base href="http://<?=$_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME']?>">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
	<link rel="stylesheet" type="text/css" href="css/summernote.min.css">
	<link rel="stylesheet" type="text/css" href="css/summernote-bs4.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	

	
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="Js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="js/jquery.flot.min.js"></script>
	<script type="text/javascript" src="js/lightbox.min.js"></script>
	<script type="text/javascript" src="js/parsley.min.js"></script>
	<script type="text/javascript" src="js/summernote.min.js"></script>
	<script type="text/javascript" src="js/summernote-bs4.min.js"></script>
	<script type="text/javascript" src="js/jasny-bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.maskMoney.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/datepicker-pt-BR.js"></script>
	<script type="text/javascript" src="lang/summernote-pt-BR.min.js"></script>

</head>
<body>
	<?php
		//verificar se esta logado 
		if( !isset ( $_SESSION["pessoa"]["id"] ) ){
			// incluir o formulário de conexao
			include "login.php";
		}else{
			//ta logado mano 
			$pagina = "paginas/calculo";
			if(isset ($_GET["param"]) ){
				$pagina = trim ( $_GET["param"]);
			}
			$p = explode("/", $pagina);
			//posicao 0 é a pasta 
			//posicao 1 é o arquivo
			//posicao 2 é o id 
			$pasta 		=$p[0];
			$arquivo	=$p[1];
			


			//$pagina = $pagina.".php"
			$pagina ="$pasta/$arquivo.php";
			//incluir o arquivo com o layout
			include "main.php";
		}

		

	?>


	

</body>
</html>
<?php
	//verfica se a sessao esta ativa
	//verifica se existe o id na sessao hqs
	//se não exstir um dos dois mostra a mensagem e dá m exit na pagina
	if ( ( session_status() != PHP_SESSION_ACTIVE ) or
		( ! isset ( $_SESSION["pessoa"]["id"] ) ) )
		{ echo "<p> Esta página não pode ser exibida, por favor efetuar login </p>";
	exit;
		}

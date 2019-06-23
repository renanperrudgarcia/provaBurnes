<?php
//iniciar a sessao
session_start();
//apagar a sessao
unset($_SESSION["pessoa"]);
//redirecionar para index
header("Location: index.php");
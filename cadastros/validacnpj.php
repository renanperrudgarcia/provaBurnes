<?php

    include "funcoes.php";  
    $cnpj="";

    if(isset ($_GET["cnpj"] ) ) {
        $cnpj = trim ($_GET["cnpj"]);
    }

    //verificar se e valido 

    if(empty ($cnpj) ) {
        echo "Digite um CNPJ";
    }

    echo validaCNPJ($cnpj);
    ?>
    
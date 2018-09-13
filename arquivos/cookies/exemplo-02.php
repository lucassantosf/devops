<?php

//Recuperar o cookie
if(isset($_COOKIE["NOME_DO_COOKIE"])){

	$obje = json_decode($_COOKIE["NOME_DO_COOKIE"]);

	echo $obje->empresa;
}



?>
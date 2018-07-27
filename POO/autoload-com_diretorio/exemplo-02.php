<?php

	spl_autoload_register(function($nomeClasse){
		if(file_exists("Abstratas".DIRECTORY_SEPARATOR.$nomeClasse.".php") === true){
			require_once("Abstratas".DIRECTORY_SEPARATOR.$nomeClasse.".php");
		}
	});

	$carro = new DelRey();
	//$carro2 = new Automovel(); Comentado pois classe automovel é abstrata, caso retirar abtract de automovel, consiguira instanciar os dois ao mesmo tempo
	$carro->acelerar(80);

?>
<?php
	function incluirClasse($nomeClasse){
		if(file_exists($nomeClasse.".php") === true){
			require_once($nomeClasse.".php");
		}
	}
	spl_autoload_register("incluirClasse");
	spl_autoload_register(function($nomeClasse){
		if(file_exists("Configs".DIRECTORY_SEPARATOR.$nomeClasse.".php") === true){
			require_once("Configs".DIRECTORY_SEPARATOR.$nomeClasse.".php");
		}
	});

	$carro = new NomeSetor();
?>
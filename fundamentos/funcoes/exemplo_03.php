<?php
	function ola($texto, $periodo = "Bom dia !"){
		return "Ol� $texto! $periodo <br/>";
	}	
	echo ola("mundo", "Boa noite");
	echo ola("Teste", "Boa tarde");
	echo ola("Teste 2");
	echo ola("");
?>
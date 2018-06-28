<?php

	$nome = "Nome 1 <br/>";
	
	function teste(){
		global $nome;
		echo $nome;
	}

	function teste2(){
		$nome = "Nome 2";
		echo $nome;
	}
	teste();	
	teste2();
?>
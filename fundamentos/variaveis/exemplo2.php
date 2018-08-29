<?php

	$anoNascimento = 1996;	
	// $1nome = "Teste" -> irá dar erro devido ao numero no inicio
	$_nome = "hw_GetAn";
	$sobrenome = "range";
	$nomeCompleto = $_nome." ".$sobrenome;
	echo $nomeCompleto;	
	exit;
	echo $_nome;
	echo '<br/>';
	//limpar a variável, destruir da memória
	unset($_nome);
	//funcao isset - verica se a variavel existe
	if(isset($_nome)){
		echo $_nome;	
	}
	

?>
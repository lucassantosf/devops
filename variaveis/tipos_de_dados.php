<?php
	$nome = "Lucas";
	$site = 'www.google.com';
	$ano = 19950;
	$salario = 5445.999;
	$bloquado = false;
	////////////////
	$frutas = array("abacaxi","laranja","manga");
	echo $frutas[2];
	echo "<br/>";echo "<br/>";echo "<br/>";
	
	$nascimento = new DateTime();
	var_dump($nascimento);
	
	echo "<br/>";echo "<br/>";echo "<br/>";
	$arquivo = fopen("exemplo3.php", "r");
	var_dump($arquivo);

	echo "<br/>";echo "<br/>";echo "<br/>";
	$nulo = null;
	$vazio = "";


?>
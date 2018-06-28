<?php
	//fazendo um Cast
	$nome = (int )$_GET["a"];
	//escrever URL http://localhost:8080/php/php_completo/variaveis/pre_definidas.php?a=123&b=456
	var_dump($nome);
	echo "<br/><br/><br/><br/>";
	$ip = $_SERVER["SCRIPT_NAME"];
	echo $ip;	
?>
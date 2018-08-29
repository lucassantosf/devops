<?php
	$a = 50;
	$b = 30;
	var_dump($a <=> $b);//SPACE SHEEP
	////////////
	$c = null;
	$d = 8;
	$e = 10;
	echo $d ?? $e ?? $c; 
	//////////// incremento e decremento
	$a = 10;
	echo $a++;
	echo $a--;
	//////////// 
	$resultado = 10 + 3 + 7;
	echo "<br/>";
	echo $resultado;
	$resultado = (10 + 3)  / 2 > 5 && 10 + 5 < 30;
	echo "<br/>";
	var_dump($resultado);
?>
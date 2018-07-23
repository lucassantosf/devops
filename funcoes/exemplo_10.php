<?php	
	//novidades php 7 - receber varios argumentos do mesmo tipo, com retorno de string/float
	function soma(float ...$valores):float {
		return array_sum($valores);
	}
	echo var_dump(soma(2,2));
	echo "<br/>";
	echo var_dump(soma(2.2,2));
	echo "<br/>";
?>
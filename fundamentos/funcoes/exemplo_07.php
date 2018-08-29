<?php	
	//novidades php 7 - receber varios argumentos do mesmo tipo
	function soma(int ...$valores){
		return array_sum($valores);
	}
	echo soma(2,2);
	echo "<br/>";
	echo soma(2,246);
	echo "<br/>";
	echo soma(2.4,2.2);
	echo "<br/>";
?>
<?php
	$diaDaSemana = date("w");
	switch($diaDaSemana){
		case 0:
			echo "Domingo";
			break;
		case 1:
			echo "Segunda-feira";
			break;
		case 2:
			echo "Ter�a-feira";
			break;
		case 3:
			echo "Quarta-feira";
			break;
		case 4:
			echo "Quinta-feira";
			break;
		case 5:
			echo "Sexta-feira";
			break;
		case 6:
			echo "S�bado";
			break;
		default:
			echo "Data Inv�lida";
	}
?>
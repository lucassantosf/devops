<?php
	$qualSuaIdade = 130;	
	
	$idadeCrianca = 12;
	$idadeMaior = 18;
	$idadeMelhor = 65;

	if($qualSuaIdade < $idadeCrianca){
		echo "Idade de crianca";
	}else if($qualSuaIdade < $idadeMaior){
		echo "Idade Adolescente";
	}else if($qualSuaIdade < $idadeMelhor){
		echo "Idade adulto";
	}else{
		echo "Idoso";
	}
	echo "<br>";
	echo ($qualSuaIdade < $idadeMaior)?"Menor de Idade":"Maior de idade";
	echo "<br>";
	echo ($qualSuaIdade > $idadeMelhor)?"Idoso":"Não idoso";
?>
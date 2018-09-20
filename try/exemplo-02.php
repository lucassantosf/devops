<?php

function trataNome($name){

	if(!$name){
		throw new Exception("Nenhum nome informado", 1);		
	}

	echo ucfirst($name)."<br>";
}

try{

	trataNome("Nome do usuário");
	trataNome("");

}catch(Exception $e){

	echo $e->getMessage()."<br>";

}finally{ //Independente do try ou catch sempre executará

	echo "Executou o Try!"."<br>";

}

?>
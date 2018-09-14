<?php

$name = "images";

if(!is_dir($name)) {//verifica se o diretório existe

	mkdir($name); //mkdir cria um diretório

	echo "Diretório $name criado com sucesso";

}else{

	rmdir($name);//Remover um diretório
	echo "Já existe o diretório : $name foi removido";

}





?>
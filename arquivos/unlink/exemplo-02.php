 <?php

//Limpar todos os aruquivos do diretório

if (!is_dir("images")) mkdir("images");

foreach (scandir("images") as $item) {
	
	if(!in_array($item, array(".",""))){

		unlink("images/".$item);
	}

}

echo "OK";


?>
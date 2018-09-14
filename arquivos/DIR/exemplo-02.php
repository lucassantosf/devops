<?php

$images = scandir("images");//escaneia um diretório com seus arquivos, retornando um array para cada arquivo

$data = array();

foreach ($images as $img) {

	if(!in_array($img, array(".",".."))){//onde estou procurando - needle, o que estou procurando haystack

		$filename = "images".DIRECTORY_SEPARATOR.$img;

		$info = pathinfo($filename);

		$info["size"] = filesize($filename);//pegar tamanho do arquivo em bytes
		$info["modified"] = date("d/m/Y H:i:s", filemtime($filename));
		$info["url"] = "http://localhost:8080/php_completo/arquivos/dir/".str_replace("\\", "/", $filename);

		array_push($data, $info);

	}
	
}

echo json_encode($data);

?>
<?php

$images = scandir("images");//Ler um diretório e será retornado um array com os arquivos que possuir

$data = array();

foreach ($images as $img) {
	if(!in_array($img,array(".",".."))){

		$filename = "images".DIRECTORY_SEPARATOR.$img;
		$info = pathinfo($filename);

		$info["size"] = filesize($filename);//Adicionar o tamanho do arquivo em bytes
		$info["modified"] = date("d/m/Y H:i:s", filemtime($filename));
		$info["url"] = "http://localhost:8080/php_completo/DIR/".str_replace("//", "/",$filename);
		array_push($data, $info);

	}
}

echo json_encode($data);

?>
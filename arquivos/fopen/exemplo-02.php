<?php

require_once("config.php");

$sql = new Sql();

$usuarios = $sql->select("Select * from tb_usuarios order by desclogin");

$headers = array();

foreach ($usuarios[0] as $key => $value) {
	
	array_push($headers, ucfirst($key));
}

$file = fopen("usuarios.csv", "w+");

fwrite($file, implode(",",$headers)."\r\n");

foreach ($usuarios as $row) { //percorrer as linhas
	
	$data = array();

	foreach ($row as $key => $value) { //percorrer as colunas de cada linha
		
		array_push($data, $value);

	}

	fwrite($file, implode(",", $data)."\r\n");

}

fclose($file);

?>
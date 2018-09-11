<?php

require_once("config.php");

$sql = new Sql();

$usuarios = $sql->select("select * from tb_usuarios order by desclogin ");

$headers = array();

foreach ($usuarios[0] as $key => $value) {
	array_push($headers, ucfirst($key));
}

//geração do arquivo
$file = fopen("usuarios.csv", "w+");
fwrite($file, implode(",",$headers)."\r\n");
foreach ($usuarios as $row) { //Para cada linha 
	$data = array();
	foreach ($row as $key => $value) {//Para as colunas
		array_push($data, $value);
	}//End colunas
	fwrite($file, implode(",", $data)."\r\n");
}//End linha

fclose($file);

?>
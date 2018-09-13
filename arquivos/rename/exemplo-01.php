<?php

$dir1 = "folder_01";
$dir2 = "folder_02";

if(!is_dir($dir1)) mkdir($dir1);
if(!is_dir($dir2)) mkdir($dir2);

$filename = "README.txt";

if(!file_exists($dir2.DIRECTORY_SEPARATOR.$filename)){

	$file = fopen($dir2.DIRECTORY_SEPARATOR.$filename, "w+");

	fwrite($file, date("Y-m-d H:i:s"));

	fclose($file);	
}

rename($dir2.DIRECTORY_SEPARATOR.$filename, $dir1.DIRECTORY_SEPARATOR.$filename);

echo "Arquivo movido com sucesso";

?>
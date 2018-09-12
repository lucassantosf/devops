<?php
//Ler arquivo em binário para converter em base64
$filename = "tiger.jpg";

$base64 = base64_encode(file_get_contents($filename));

$fileinfo = new finfo(FILEINFO_MIME_TYPE);

$mimetype = $fileinfo->file($filename);

$base64encode = "data:".$mimetype.";base64,".$base64;

?>

<a href="<?=$base64encode?>" target="_black">Link para Imagem</a>

<img src="<?=$base64encode?>">
<?php

header("Content-Type: image/png");

$image = imagecreate(256, 256);//em pixels

$black = imagecolorallocate($image, 0, 0, 0);
$red = imagecolorallocate($image, 255, 0, 0);

imagestring($image, 5, 60, 120, "Curso de PHP", $red);//definição de propriedades da imagem

imagepng($image);//renderiza na tela

imagedestroy($image);//destrói a comunicação com o recurso

?>
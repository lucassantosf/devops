<?php

//Array com os nomes e caminhos das Fontes
$font = array("Bevan"=>__DIR__.DIRECTORY_SEPARATOR."fonts".DIRECTORY_SEPARATOR. "Bevan".DIRECTORY_SEPARATOR."Bevan-Regular.ttf",
"Playball"=>__DIR__.DIRECTORY_SEPARATOR."fonts".DIRECTORY_SEPARATOR."Playball".DIRECTORY_SEPARATOR."Playball-Regular.ttf");
 
$image = imagecreatefromjpeg("certificado.jpg");
 
$titleColor = imagecolorallocate($image, 0,0,0);
 
$grey = imagecolorallocate($image, 100,100,100);
 
imagettftext ($image, 32,0,450,100, $titleColor, $font["Bevan"],"CERTIFICADO");
 
imagettftext($image, 32,0,450,350, $titleColor, $font["Playball"], "Luxson Bevan");
 
imagestring($image,5,450,350, utf8_decode("Concluído em: ".date("d/m/Y")), $grey);
 
header("Content-type: image/jpg");
 
imagejpeg($image);
 
imagedestroy($image);
?>
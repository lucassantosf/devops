<?php

$image = imagecreatefromjpeg("certificado.jpg");

$titleColor = imagecolorallocate($image, 0, 0, 0); //paleta de cores
$gray = imagecolorallocate($image, 100, 100, 100);

imagestring($image, 5/*tamanho da fonte*/, /*Posições x e y*/450, 150, "CERTIFICADO", $titleColor); //escrever na imagem
imagestring($image, 5/*tamanho da fonte*/, /*Posições x e y*/440, 350, "Luxson Silva", $titleColor);
imagestring($image, 3/*tamanho da fonte*/, /*Posições x e y*/440, 370, utf8_decode("Concluido em: ").date("d/m/Y"), $titleColor);

header("Content-type: image/jpeg"); 

imagejpeg($image, "certificado-".date("Y-m-d").".jpg", 100);

imagedestroy($image);

?>
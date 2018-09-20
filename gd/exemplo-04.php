<?php

//Thumbnail
header("Content-type: image/jpg");
 
$file = "wallpaper.jpg";

$nem_width = 256;
$nem_height = 256;

list($old_width, $old_height) = getimagesize($file);

$new_image = imagecreatetruecolor($nem_width, $nem_height);
$old_image = imagecreatefromjpeg($file);

imagecopyresampled($new_image, $old_image, 0, 0, 0, 0, $nem_width, $nem_height, $old_width, $old_height);

imagejpeg($new_image);

imagedestroy($old_image);
imagedestroy($new_image);

?>
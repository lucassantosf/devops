<?php

$conn = new PDO("mysql:dbname=dbphp7;host=localhost","root","");

$stmt = $conn->prepare("delete from tb_usuarios where id_usuario = :ID");

$id = 2;

$stmt->bindParam(":ID",$id);

$stmt->execute();

echo "Delete OK!";

?>
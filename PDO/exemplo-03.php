<?php

$conn = new PDO("mysql:dbname=dbphp7;host=localhost","root","");

$stmt = $conn->prepare("insert into tb_usuarios(deslogin, dessenha) values (:LOGIN, :PASSWORD)");

$login = "lll";
$passord = "131323";

$stmt->bindParam(":LOGIN",$login);
$stmt->bindParam(":PASSWORD",$passord);

$stmt->execute();

echo "Inserido OK!";


?>
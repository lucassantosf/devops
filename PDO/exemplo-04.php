<?php

$conn = new PDO("mysql:dbname=dbphp7;host=localhost","root","");

$stmt = $conn->prepare("update tb_usuarios set deslogin = :LOGIN, dessenha = :PASSWORD where id_usuario = :ID");

$id = 1;
$login = "lll";
$passord = "newSenhaalterada";

$stmt->bindParam(":LOGIN",$login);
$stmt->bindParam(":PASSWORD",$passord);
$stmt->bindParam(":ID",$id);

$stmt->execute();

echo "Alterado com sucesso OK!";

?>
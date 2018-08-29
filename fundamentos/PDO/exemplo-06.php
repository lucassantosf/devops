<?php

$conn = new PDO("mysql:dbname=dbphp7;host=localhost","root","");

$conn->beginTransaction();//Início da transação

$stmt = $conn->prepare("delete from tb_usuarios where id_usuario = ?");

$id = 3;

$stmt->execute(array($id));

//$conn->rollback();//Não pode concluir a transação

$conn->commit();//Executa a transação

echo "Delete OK!";

?>
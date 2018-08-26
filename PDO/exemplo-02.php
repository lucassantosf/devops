<?php

$conn = new PDO("sqlsrv:Database=dbphp7;server=localhost\LUCAS\SQLEXPRESS;ConnectionPooling=0", "sa", "root");

$stmt = $conn->prepare("Select * from tb_usuarios");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($results);

?>
<?php

$id = (isset($_GET["id"]))?$_GET["id"]:1;

//evitar o sql injection

if(!is_numeric($id) || strlen($id) > 5){

	echo "Pegamos voce";

}

$conn = mysqli_connect("localhost","root","","dbphp7");

$sql = "select * from tb_usuarios where id_usuario = $id";

$exec = mysqli_query($conn, $sql);

while($resultado = mysqli_fetch_object($exec)){

	var_dump($resultado);

}

//sql injection - exemplo-02.php?id=5 or 1 = 1 --

?>
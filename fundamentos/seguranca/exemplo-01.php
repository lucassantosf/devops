<?php
if($_SERVER["REQUEST_METHOD"] === 'POST'){

	$cmd = escapeshellcmd($_POST["cmd"]); // Forma de proteger quando são comando de sistema

	var_dump($cmd);

	echo "<pre>";

	$comando = system($cmd, $return);

	echo "</pre>";

}
//comando injection - dir c:\ && C:/xampp/xampp_stop.exe
?>
<form method="post">
	<input type="text" name="cmd">
	<button type="submit">Enviar</button>
</form>
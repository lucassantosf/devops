<form method="POST">
	<input type="text" name="busca">
	<button type="submit">Enviar</button>
</form>

<?php
//Tratar tipos de ataques XSS em comandos de formulário
$_POST['busca'] = '<strong>Oi<strong><script>alert("oi")</script>';

if(isset($_POST['busca'])){

	//echo strip_tags($_POST['busca'], "<strong><a>"); //remover as tags 
	echo htmlentities($_POST['busca']);//considerar as tags

}
?>
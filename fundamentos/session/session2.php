<?php
	require_once('configSessionExample.php');
	// quebra a sessão
	session_unset();
	//session_destroy();
	echo $_SESSION['nome'];	
?>
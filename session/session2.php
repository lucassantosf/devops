<?php
	require_once('configSessionExample.php');
	// quebra a sess�o
	session_unset();
	//session_destroy();
	echo $_SESSION['nome'];	
?>
<?php	 
	require_once("configuracaoSessao.php");
	session_regenerate_id();
	echo session_id();
	echo "<br/>";
	var_dump($_SESSION);
?>
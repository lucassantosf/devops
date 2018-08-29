<?php
	require_once('configuracaoSessao.php');
	//acaba com a sessão
	session_unset();
	echo $_SESSION['nome'];
?>
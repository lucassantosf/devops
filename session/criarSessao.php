<?php
	require_once('configuracaoSessao.php');
	//acaba com a sess�o
	session_unset();
	echo $_SESSION['nome'];
?>
<?php
	
	require_once("config.php");

	use Cliente\Cadastro;

	$cad = new Cadastro();

	$cad->setNome("Lucas F S");
	$cad->setEmail("lfs");
	$cad->setSenha("2346");

	//echo $cad;
	$cad->registrarVenda();
?>
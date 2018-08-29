<?php

	$pessoas = array();
	array_push($pessoas, array(
		'nome'=>'Lucas',
		'idade'=>20
	));

	array_push($pessoas, array(
		'nome'=>'Lucas 2',
		'idade'=>30
	));

	print_r($pessoas[0]['nome']);
?>
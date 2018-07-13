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

	echo json_encode($pessoas);
?>
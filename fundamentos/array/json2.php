<?php	
	//decoding json para array
	$json = '[{"nome":"Lucas","idade":20},{"nome":"Lucas 2","idade":30}]';
	$data = json_decode($json, true);
	var_dump($data);s
?>
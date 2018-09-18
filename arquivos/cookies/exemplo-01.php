<?php

$data = array(
	"empresa"=>"SS COMPANY"
);

setcookie("NOME_DO_COOKIE", json_encode($data), time()+3600);

echo "OK";




?>
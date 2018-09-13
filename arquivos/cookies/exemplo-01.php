<?php
//Criar cookie
$data = array(
	"empresa"=>"Turismo"
);

setcookie("NOME_DO_COOKIE", json_encode($data), time() + 3600);//criado por uma hora, após isto não existirá na memória do navegador

echo "Cookie criado";


?>
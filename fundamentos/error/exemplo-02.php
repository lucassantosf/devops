<?php

error_reporting(E_ALL & ~E_NOTICE);//não ira exibir os notice quando ocorrer, apenas erros

$nome = $_GET["nome"];

echo $nome;



?>
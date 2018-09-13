<?php

$cep = "01310-100";
$link = "https://viacep.com.br/ws/$cep/json/";

$ch = curl_init($link);//Ìnicio da requisição

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//Parametro 1 aguarda um retorno;
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);

print_r($data["localidade"]);

?>
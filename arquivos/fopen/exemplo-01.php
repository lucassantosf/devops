<?php

$file = fopen("log.txt", "a+"); //Criar o arquivo e criar com permissão para w+

fwrite($file, date("Y-m-d H:i:s")."\r\n");//escrever no arquivo 

fclose($file); //Fechar a comunicação com o arquivo

echo "Arquivo criado com sucesso!";
?>
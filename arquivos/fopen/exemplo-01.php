<?php

$file = fopen("log.txt","a+");//criar um arquivo

fwrite($file, date("Y-m-d H:i:s"). "\r\n");

fclose($file);//fechar o arquivo

echo "Arquivo criado com sucesso";


?>
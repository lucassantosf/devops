<?php
//permissões de 0 até 7 em sequencia -> nenhuma, execução, gravação, junção(exec e grava), leitura, leitura e exec, leitura e gravacao, total
//nomenclatura para permissões de usuários é baseado nos número (dono, grupos, outros)
$pasta = "arquivos";
$permissao = "0775";

if(!is_dir($pasta)) mkdir($pasta, $permissao);
echo "Diretório criado com sucesso!";


?>
<?php

require_once("config.php");

//Carrega apenas um usuário
//$root = new Usuario();
//$root->loadById(21);
//echo $root;

//Carregar uma lista de usuários
//lista = Usuario::getList();
//echo json_encode($lista);


//Carregar uma lista de usuários buscando pelo login
//$search = Usuario::search("o");
//echo json_encode($search);

//Fazer login carregando apenas um usuário
//$usuario = new Usuario();
//$usuario->login("llla","newSenhaalterada");
//echo $usuario;

//Insert de novo usuário
//$aluno = new Usuario("aluno","45");
//$aluno->insert();
//echo $aluno;

/*Editar um usuário existente
$usuario = new Usuario();
$usuario->loadById(20);
$usuario->update("TEACHER","111233334");
echo $usuario;*/

//Deletar um usuário
$usuario = new Usuario();
$usuario->loadById(20);

$usuario->delete();

echo $usuario;
?>
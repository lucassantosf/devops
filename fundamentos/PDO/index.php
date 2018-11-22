<?php

require_once("config.php"); //Requerindo a classe Config, onde há o autoload das classes que aqui forem chamadas

/*Pesquisar cliente por id
$root = new Cliente();
$root->loadById(1);
echo $root;
*/

/*Listar clientes
$lista = Cliente::getList();
echo json_encode($lista);*/

/*Carregar uma lista de usuarios buscando pelo login
$search = Cliente::search("lucas");
echo json_encode($search);*/

/*Exemplo de autenticação
$cliente = new Cliente();
$cliente->login("lucas","123");
echo $cliente;*/

/*Inserir um cliente através de uma procedure
$cliente = new Cliente("cliente","login","6546");
$cliente->insert();
echo $cliente;*/

/*Alterar um cliente
$cliente = new Cliente();
$cliente->loadById(8);
$cliente->update("teste23","654866");
echo $cliente;*/

/*Deletar um cliente*/
$cliente = new Cliente();
$cliente->loadById(8);
$cliente->delete();
echo $cliente;

?>
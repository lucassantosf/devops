Arquivos do Banco de Dados deste projeto

Segue em ordem de execução e alterações realizadas para o desenvolvimento do Ecommerce.

1  - Modelagem inicial do projeto
2  - Modalagem com procedures para crud de usuários
3  - Script da procedure para recuperar senha de usuário
4  - Script parar criar tb_categories - já existe na modelagem incial esta tabela
5  - Criar procedure para manipular criação de categorias
6  - Procedure para salvar produtos na área admin
7  - Script para cadastrar alguns produtos
8  - Script para criar tabela de relacionamento entre Produtos X Categorias
8.1- Deletar a tabela tb_categoriesproducts - esta tabela acaba não sendo mais utilizada 
9  - Script para alterar detalhes da tabela do carrinho de compras - tb_carts
10 - Script criar procedure de salvar dados no carrinho de compras
10.1 - Alterar a coluna dtremoved de NN para Null da tabela tb_cartsproducts
11 - Script das alterações na tabela tb_address
12 - Script para criar procedure de salvar endereços na tb_address
13 - Script com alterações da tabela de pedidos
14 - Script para criar procedure de salvar pedidos
15 - Script para ajustar tabela de usuários para quando é feito exclusão, assim todos os registros referenciados são excluido sem nenhum problema
16 - Script para alterar tabela de endereços para adicionar a coluna de número (Isto é necessário para integração com Pagseguro)
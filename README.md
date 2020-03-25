# CrudPHP

#### Linguagem Utilizada 
  - PHP ^7.2

#### Banco de dados utilizado
 - MySQL 5.7

###### Configuração de Ambiente
Após clonar o repositório...

1. Importar/executar o script database.sql no diretório /db;
1. Configurar as variaveis DATA_LAYER_CONFIGS no diretório /app/Config.php
	1. Alterar "username=''" para seu usuário do banco de dados;
	1. Alterar "passwd=''" para a senha referente ao usuário do banco de dados;
    1. Alterar "host=''" para o host ao seu banco de dados;
    1. Alterar "port=''" para a porta ao seu banco de dados;
    1. Alterar a URL ROOT de acordo com a configuração de seu de ambiente desenvolvimento local;
1. Executar o comando "composer install" no diretório CrudPHP;
1. Copiar repositório para o ambiente de desenvolvimento local do Xampp ou simimilar(EasyPHP,WampServer,...)


#### Rotas permitidas para requisições

- Listagem de clientes: '/customer' **(Método GET)**;
- Remoção de cliente: '/customer/{id}'   *Id do cliente a ser removido* / **(Método DELETE)**;
- Armazenamento de  um novo cliente: '/customer' *Requisição no formato de form-data:name=????,email:????....*   **(Método POST)** ; 
- Atualização de um cliente existente: '/customer/{id}' *Id do cliente a ser removido* + *Requisição no formato de form-data:name=????,email:????....*  / **(Método POST)** ; 


#### Estrutura e design patterns


###### MVC

Projeto baseado na estrutura MVC, preparado para receber a camada de visão da aplicação
Com estrutura de pastas e arquivos separados em Model, Controllers e Rotas.

[Leia mais em MVC ](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller)

###### PSR-4

Carregamento automático de classes a partir dos diretórios dos arquivos.

[Leia mais em PSR-4 ](https://www.php-fig.org/psr/psr-4/)


#### Bibliotecas de terceiros utilizadas

###### coffeecode/router

Esta biblioteca é um componente de rotas PHP com abstração para MVC, trabalhando de forma isolada e podendo ser integrada a aplicações, estando preparada com preparada com métodos (GET, POST, PUT, PATCH e DELETE)

[Leia mais em coffecode/router](https://packagist.org/packages/coffeecode/router)

###### coffeecode/datalayer

Esta biblioteca é um é um componente para abstração de persistência no seu banco de dados que usa PDO com prepared statements para executar querys como cadastrar,ler, editar e remover dados.

[Leia mais em coffecode/datalayer](https://packagist.org/packages/coffeecode/datalayer)

###### PHPUnit

Esta biblioteca é um framework  orientado a testes para PHP.
Os testes serão executados pelo PHPUnit

 - ./vendor/bin/phpunit tests/ --filter testCustomer || **Para executar teste de conexão com o banco de dados** / *Possível erro no método de assertion do em createDefaultDBConnection*; 

[Leia mais em PHPUnit](https://phpunit.readthedocs.io/en/8.0/index.html)


# Guide API

## Sobre o Guide API.

O Guide API é uma api para um guia comercial local.

Esta API permitirá, login e registro de usuários.

### Usuários administradores:

-   Gerenciar Categorias
-   Gerenciar Locais
-   Métricas de Acessos

### Usuários visitantes:

-   Visualizar Locais
-   Avaliar Locais
-   Favoritar Locais
-   Adicionar Fotos do Local (Com aprovação do admin)

### Locais

-   Quais quer tipo de locais de uma cidade, comercial ou não, pública ou privada, que possa ser útil aos usuários, com contato, logo, redes sociais e outras formas de contato.

### Categorias

-   Categorias de Locais pra facilitar a busca dentro da aplicação, cada local pertencerá a uma categoria.

Seguimos a estrutura padrão do estilo [RESTful](https://en.wikipedia.org/wiki/Representational_state_transfer)

-   GET: lista ou consulta dados
-   POST: criação de dados
-   PUT: atualização de dados
-   DELETE: remoção de dados

## Padrão de endpoints

    Para listagem,      use GET: /endpoint
    Para inserção,      use POST: /endpoint
    Para visualização,  use GET: /endpoint/{id}
    Para atualização,   use PUT/PATCH: /endpoint/{id}
    Para exclusão,      use DELETE: /endpoint/{id}

## Seções (endpoints) disponíveis

Segue as seções que você pode acessar pela API

Principais:

-   [/api/auth/login](#)
-   [/api/auth/register](#)

-   [/api/categories](#)
-   [/api/categories/{id}](#)

### Header

A requisição deve conter:

-   Content-Type: application/json
-   Access-Token: SEU_TOKEN_AQUI

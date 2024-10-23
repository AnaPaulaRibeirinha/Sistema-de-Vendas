# Sistema de Vendas

![Sistema de Vendas]

## Índice

- [Pré-requisitos](#pré-requisitos)
- [Passos](#passos)
  1. [Clone o repositório e acesse o diretório](#1-clone-o-repositório-e-acesse-o-diretório)
  2. [Instale as dependências Composer](#2-instale-as-dependências-composer)
  3. [Configurando .env](#3-configurando-env)
  4. [Inicialize o servidor](#4-inicialize-o-servidor)
  5. [Instale as dependências do Node.js](#5-instale-as-dependências-do-nodejs)
  6. [Gere uma chave de aplicativo](#6-gere-uma-chave-de-aplicativo)
  7. [Execute as migrations e seeders (se aplicável)](#7-execute-as-migrations-e-seeders-se-aplicável)
  8. [Inicie o servidor de desenvolvimento Node](#8-inicie-o-servidor-de-desenvolvimento-node)

## Pré-requisitos

- [PHP](https://www.php.net/) +8.2
- [Composer](https://getcomposer.org/download/)
- [Node.js](https://nodejs.org/en)
- Acesso à internet.

## Passos

### 1. Clone o repositório e acesse o diretório

Clone o repositório utilizando o comando:

```bash
git clone https://github.com/usuario/sistema-vendas.git
cd sistema-vendas
```

### 2. Instale as dependências Composer

Instale as dependências do Composer:

```bash
composer install
```

### 3. Configurando .env

Copie o arquivo .env:

```bash
cp .env.example .env
```

### 3.1 Configurando o Banco de Dados

Configure as credenciais do seu banco de dados no arquivo .env

```bash
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=sistema_vendas
DB_USERNAME=root
DB_PASSWORD=root
```

### 4. Inicialize o servidor

Inicie o servidor PHP:

```bash
php artisan serve
```

### 5. Instale as dependências do Node.js

Instale as dependências do Node.js:

```bash
npm install
```
### 6. Gere uma chave de aplicativo

Gere a chave do aplicativo:

```bash
php artisan key:generate
```
### 7. Execute as migrations e seeders 

Execute o seguinte comando:

```bash
php artisan migrate --seed

```
### 8. Inicie o servidor de desenvolvimento Node

Inicie o servidor de desenvolvimento Node:

```bash
npm run dev

```











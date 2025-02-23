# CRUD de Produtos com Laravel

Este projeto implementa um CRUD de produtos e categorias utilizando Laravel. Cada produto pertence a uma categoria, e as operações são acessadas via navegador utilizando Blade para renderização.

## Tecnologias Utilizadas
- **Laravel** (Framework PHP)
- **PostgreSQL** (Banco de dados)
- **Docker** (Ambiente de desenvolvimento)

## Configuração e Instalação
### 1. Clonar o repositório
```bash
git clone https://github.com/MSaJS/CRUD-Prova-Seletiva.git
cd CRUD-Prova-Seletiva
```

### 2. Configurar o ambiente com Docker
```bash
docker-compose up -d --build
```
Isso irá iniciar os containers da aplicação e do banco de dados.

### 3. Instalar as dependências do Laravel
```bash
docker exec -it laravel_app composer install
```

### 4. Criar o arquivo de ambiente
```bash
cp .env.example .env
```
Edite o arquivo `.env` conforme necessário, especialmente as configurações do banco de dados:
```
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```

### 5. Executar as migrations e seeders
```bash
docker exec -it laravel_app php artisan migrate --seed
```
Isso criará as tabelas `categories` e `products` no banco de dados e populará com dados iniciais.

## Como Acessar o Sistema
Após a configuração, acesse no navegador:
```
http://localhost:8077
```
O CRUD pode ser acessado diretamente através das seguintes rotas:

- **Produtos**: `http://localhost:8077/products`
- **Categorias**: `http://localhost:8077/categories`

## Estrutura do Banco de Dados
### Tabela: `categories`
- `id` (Auto-incremento)
- `nome` (String, obrigatório)
- `descricao` (Texto, opcional)
- `created_at` e `updated_at` (Timestamps)

### Tabela: `products`
- `id` (Auto-incremento)
- `nome` (String, obrigatório)
- `descricao` (Texto, opcional)
- `preco` (Decimal, obrigatório)
- `quantidade` (Inteiro, obrigatório)
- `category_id` (Chave estrangeira para `categories`)
- `created_at` e `updated_at` (Timestamps)

## Funcionalidades Implementadas
- **Listagem de Produtos** (com nome, descrição, preço, quantidade e categoria associada)
- **Cadastro de Produto** (com validação e seleção de categoria)
- **Edição de Produto** (com formulário pré-preenchido)
- **Exclusão de Produto** (com confirmação)
- **CRUD de Categorias** (opcional, mas implementado)

## Estrutura das Rotas
### Web (Blade)
Arquivo: `routes/web.php`
```php
Route::resource('products', App\Http\Controllers\ProductController::class);
Route::resource('categories', App\Http\Controllers\CategoryController::class);
```

## Observação
- O banco de dados **usa PostgreSQL**, então certifique-se de que está rodando corretamente no Docker.

---



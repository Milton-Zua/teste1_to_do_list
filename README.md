# To_do_list

Projeto desenvolvido com Laravel 12.

## Requisitos

- PHP >= 8.x  
- Composer  
- MySQL  
- Git  
- Postman (opcional)

## Configuração do Projeto

1. Clone o repositório:  
   `git clone https://github.com/Milton-Zua/teste1.git`


## passo muitíssimo importante senão o projecto não vai rodar
## após a clonagem não precisas executar os seguintes comandos,pois já fiz menção de comitar a pasta vendor e o arquivo .env no repositório. sei que não é recomendado, mas fiz isso para ajudar a altíssima entidade se estiver a enfrentar algum problema

2. não precisa fazer isso:
   `composer install`

   `cp .env.example .env`
## termina aqui o passo muitíssimo importante senão o projecto não vai rodar

4. Configure o `.env` com os dados do banco:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=sua_senha



4. Gere a chave da aplicação:  
`php artisan key:generate`

##  Rodar as Migrations

`php artisan migrate`

##  Executar o Servidor Local

`php artisan serve`  
Acesse: [http://localhost:8000](http://localhost:8000)

##  Testar a API Via `curl`:

##using curl
#criar tarefas
curl -X POST http://localhost:8000/api/tasks -H "Content-Type: application/json" -d "{\"title\":\"Estudar Laravel\", \"description\":\"Fazer o desafio\"}"

#listar tarefas
curl http://localhost:8000/api/tasks

#listar as linhas com estatos completed
curl http://localhost:8000/api/tasks/status/completed


#atualizar o dado do campo status
curl -X PUT http://localhost:8000/api/tasks/1/status -H "Content-Type: application/json" -d "{\"status\":\"completed\"}"

#deletar um registro indicando id=1
curl -X DELETE http://localhost:8000/api/tasks/1

#atualizar com um campo inválido
curl -X PUT http://localhost:8000/api/tasks/1 -H "Content-Type: application/json" -d "{\"title\":\"Teste\", \"description\":\"Teste\", \"status\":\"errado\"}"


## Observações

- `.env` e `vendor/` não estão no repositório (gitignore).
- Use `composer install` e crie `.env` a partir de `.env.example`.

## Estrutura Importante

- `app/Models/` → Modelos  
- `app/Http/Controllers/` → Controladores  
- `routes/api.php` → Rotas da API  
- `database/migrations/` → Migrations




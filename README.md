## Teste Técnico Intergalaxy

Clone o repositório:

    git clone https://github.com/edisonoda/IntergalaxyBackEnd.git

### Setup

Acesse o diretório do projeto e instale as dependências:

    composer install
    npm install

A partir do arquivo .env.example, copie um novo:

    cp .env.example .env

Crie um banco de dados em branco e coloque os dados necessários no .env. Então, execute as migrações das tabelas:

    php artisan migrate

E, caso queira, execute os seeders também:

    php artisan db:seed --class=CreateUsersSeeder
    php artisan db:seed --class=CreateProductsSeeder
    php artisan db:seed --class=CreateOrdersSeeder
                
Inicie o servidor de forma local (http://localhost:8000):

    php artisan serve

### Instruções e critérios

Auth
- Logar
- Criar conta

Admin
- Cadastrar produtos
- Listar produtos

- Listar usuários
  - Acessar usuários
  - Editar dados do usuário

- Ordens (pedidos) 
  - Listar
  - Cancelar e aprovar ordem

Dashboard
- Home com os produtos que foi cadastrado pelo admin
- "Poder Comprar" (parte de pagamento feita é opcional mas será um diferencial)

- Orderns (pedidos)
- Listar pedido
- Status dos pedido 
- Cancelar ou pagar

- Perfil
- Dados cadastrais
- Editar dados cadastrados

Obrigatório:
- Framework laravel 
- Publicar em um GitHub pessoal seu
- Banco de dados mysql
- Prazo de 1 semana
# Teste Adoorei - DEV Backend
## Requisitos
- docker-compose
- PHP 8.3 (para rodar os comandos do PHP apenas)
- Composer 2.7.1

## Executar 
- `git clone https://github.com/cemim/adoorei-teste-backend.git`
- Esse comando precisa ser dado dentro do diretório docker `docker-compose up -d`
- Para confirmar se todos os container subiram  `docker ps`. Todos os container devem estar como "up".
- Copiar o conteúdo do arquivo .env.example para um novo arquivo chamado .env.
- Comando na raíz do projeto para instalar os dependências do PHP `composer install`
- Acessar no navegador [localhost](http://localhost/)
- Após o primeiro acesso dará um erro solicitando para gerar uma nova key do banco, para resolver clicar em "generate app key" e depois em "refresh now".
- Gerar a estrutura do banco, exemplos de produtos e um usuário para a API:
    - `docker exec -it teste-adoorei-php83 sh -c  "cd /var/www/html && php artisan migrate:fresh"`
    - `docker exec -it teste-adoorei-php83 sh -c  "cd /var/www/html && php artisan db:seed --class=ProductsTableSeeder"`
    - `docker exec -it teste-adoorei-php83 sh -c  "cd /var/www/html && php artisan db:seed --class=CreateUserSeeder"`
- Documentação da API para o postman está no arquivo [Postman JSON](<Adoorei Testes.postman_collection.json>)
- Link do projeto [Aqui](https://github.com/users/cemim/projects/2/views/1)



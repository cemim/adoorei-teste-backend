# Teste Adoorei - DEV Backend
## Requisitos
- docker-compose
- Composer 

## Executar 
- Dentro do diretório docker executar o comando: `docker-compose up -d`;
- Acessar em [Localhost](http://localhost/)
- `docker exec -it teste-adoorei-php83 sh -c  "cd /var/www/html && php artisan migrate:fresh"`
- `docker exec -it teste-adoorei-php83 sh -c  "cd /var/www/html && php artisan db:seed --class=ProductsTableSeeder"`



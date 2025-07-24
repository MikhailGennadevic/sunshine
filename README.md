# sunshine

Выполнить

```
composer install
php artisan migrate
php artisan db:seed
```

для получение токена сделать запрос на  http://localhost:8000/api/login

```
"email": "test@example.com",
"password": "password"
```

http://localhost:8000/api/products - основной url для API
http://localhost:8000/api/products/total - сумма по товарам в наличии
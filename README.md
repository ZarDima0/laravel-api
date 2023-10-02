### Тестовое задание RestApi
### Нужно скопировать .env.example -> .env
### backend-core .env.example -> .env
#### Переменные для подключения к БД
`DB_HOST=postgres`

`DB_DATABASE=#НАИМЕНОВАНИЕ_БД#`

`DB_USERNAME=#ИМЯ_ПОЛЬЗОВАТЕЛЯ_БД#`

`DB_PASSWORD=#ПАРОЛЬ_ПОЛЬЗОВАТЕЛЯ_БД#`

### docker-compose up --build -d

### docker exec -it laravel-php bash

### Выполнить в контейнере установку пакетов Composer

`composer install`

### Выполнить миграции

`php artisan migrate`

### Выполнить генерацию ключа `APP_KEY`

`php artisan key:generate`

### Запуститьс сидер

`php artisan db:seed --class=BanksTableSeeder`

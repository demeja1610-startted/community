## Установка проекта
1. `cp .env.example .env`
    1. APP_URL = тот url c которого надо проксить сайт
    2. DB_DATABASE - название БД
    3. DB_USERNAME - логин от БД
    4. DB_PASSWORD - пароль т БД
2. `composer install`
3. `yarn`
4. `php artisan key:generate`
5. `php artisan migrate`

## Установка Redis для  Mac OS 
1. `brew install redis`
2. `brew services start redis`
3. `redis-cli`
4. `ping`
Если в консоли появился ответ PONG, значит редис установлен и работает

## Настройка подключения в Redis серверу
Операции выполяются в .env файле

1. REDIS_HOST=127.0.0.1
2. REDIS_PASSWORD=null
3. REDIS_PORT=6379
4. QUEUE_CONNECTION=redis

Чтобы джобы которые есть в проекте выполнялись с помощю редиса необходимо выполнить команду `php artisan horizon`. 
Это запустит супервизора, а также по адресу /horizon запуститься real-time панель для мониторинга. 
Чтобы проверить работает ли redis и horizon выполни команду `php artisan predis:test`
При успешной настройке в laravel.log создастся запись  - "local.INFO: Redis is working!"

# Telegram Bot Anonymous Chat

Сервис обмена текстовыми сообщениями через Telegram Bot

## Используемые пакеты

[Debug - Telescope](https://laravel.com/docs/11.x/telescope)

[API Auth - Sanctum](https://laravel.com/docs/11.x/sanctum)

[Local dev - Sail](https://laravel.com/docs/11.x/sail)

[Code style fixer - Pint](https://laravel.com/docs/11.x/pint)

## INSTALL

Клонировать репозиторий

Перейти в папку с проектом и выполнить следующие команды:

```
composer install

composer run-script post-root-package-install

php artisan key:generate

php artisan migrate

```

Получить и установить токен телеграм бота *env* переменная **TELEGRAM_BOT_TOKEN**

Сгененроировать **UUID** строку задать значение *env* переменной **TELEGRAM_ROUTE_TOKEN**

После установки основных переменных окружения необходимо зарегистрировать URL для получения Telegram webhooks входящих сообщений.

**ВНИМАНИЕ !** Хостинг где установлен проект, должен быть доступен из вне по протоколу **https** и иметь **действующий TLS сертификат**, иначе Telegram API не зарегистрирует URL, в таком случае **не будет возможности** получать входящие сообщения от контактов бота.

## Базовые команды

Регистрация Telelegram webhook URL

```
php artisan app:register-telegram-bot-webhook
```

Удаление Telelegram webhook URL

```
php artisan app:remove-telegram-bot-webhook
```

Регистрация пользователей

```
php artisan app:create-user
```


## DOCKER FOR LOCAL DEV

В корне проекта выполнить команду:

```
docker compose build
```

### TESTING

```
php artisan test
```
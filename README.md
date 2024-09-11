# Telegram Bot Anonymous Chat

Сервис обмена текстовыми сообщениями через Telegram Bot

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

## DOCKER FOR LOCAL DEV

В корне проекта выполнить команду:

```
docker compose build
```

### TESTING

```
php artisan test
```
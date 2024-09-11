<?php

/**
 * Получение Telegram Bot API URL вместе с токеном
 *
 * @throws \Exception
 */
function getTelegramApiUrl(): string
{
    $token = config('services.telegram_bot.token');

    if (! $token) {
        throw new \Exception(__('exceptions.missing_telegram_bot_token'));
    }

    return config('services.telegram_bot.api_url').$token;
}

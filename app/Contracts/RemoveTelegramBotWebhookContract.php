<?php

namespace App\Contracts;

/**
 * Удаление зарегистрированного Telegram webhook
 */
interface RemoveTelegramBotWebhookContract
{
    /**
     * Удалить зарегистрированный Telegram webhook
     */
    public function __invoke(): bool;
}

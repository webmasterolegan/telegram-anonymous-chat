<?php

namespace App\Contracts;

/**
 * Регистрация Telegram webhook
 */
interface RegisterTelegramBotWebhookContract
{
    /**
     * Зарегистрировать Telegram webhook
     */
    public function __invoke(): bool;
}

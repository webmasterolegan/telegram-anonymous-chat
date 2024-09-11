<?php

namespace App\Actions;

use App\Contracts\RemoveTelegramBotWebhookContract;
use Illuminate\Support\Facades\Http;

/**
 * Удаление зарегистрированного Telegram webhook
 */
class RemoveTelegramBotWebhookAction implements RemoveTelegramBotWebhookContract
{
    /**
     * Удалить зарегистрированный Telegram webhook
     */
    public function __invoke(): bool
    {
        $url = getTelegramApiUrl().'/setWebhook?remove';

        $response = Http::get($url);

        $result = $response->json();

        if (! $result['ok']) {
            throw new \Exception($result['description']);
        }

        return true;
    }
}

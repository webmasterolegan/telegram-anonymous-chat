<?php

namespace App\Actions;

use App\Contracts\RegisterTelegramBotWebhookContract;
use Illuminate\Support\Facades\Http;

/**
 * Регистрация Telegram webhook
 */
class RegisterTelegramBotWebhookAction implements RegisterTelegramBotWebhookContract
{
    /**
     * Зарегистрировать Telegram webhook
     */
    public function __invoke(): bool
    {
        $url = getTelegramApiUrl().'/setWebhook';

        $response = Http::acceptJson()->post($url, [
            'url' => route('telegram.webhook'),
        ]);

        $result = $response->json();

        if (! $result['ok']) {
            throw new \Exception($result['description']);
        }

        return true;
    }
}

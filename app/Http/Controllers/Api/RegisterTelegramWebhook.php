<?php

namespace App\Http\Controllers\Api;

use App\Contracts\RegisterTelegramBotWebhookContract;
use Illuminate\Http\JsonResponse;

/**
 * Регистрация Telegram webhook URL
 */
class RegisterTelegramWebhook
{
    public function __invoke(RegisterTelegramBotWebhookContract $registerAction): JsonResponse
    {
        if ($registerAction()) {
            return response('Success register Telegram webhook')->json();
        }

        return response('Error register Telegram webhook')->json();
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Contracts\RemoveTelegramBotWebhookContract;
use Illuminate\Http\JsonResponse;

/**
 * Удаление Telegram webhook URL
 */
class RemoveTelegramWebhook
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RemoveTelegramBotWebhookContract $removeAction): JsonResponse
    {
        if ($removeAction()) {
            return response('Success remove Telegram webhook')->json();
        }

        return response('Error remove Telegram webhook')->json();
    }
}

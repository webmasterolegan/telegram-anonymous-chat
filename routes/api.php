<?php

use App\Http\Controllers\Api\TelegramWebhook;
use Illuminate\Support\Facades\Route;

/**
 * Обработка Telegram webhooks
 */
Route::post('/webhook/'.config('services.telegram_bot.route_token'), TelegramWebhook::class)->name('telegram.webhook');

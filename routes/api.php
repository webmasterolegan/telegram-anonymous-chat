<?php

use App\Http\Controllers\Api\GetAuthToken;
use App\Http\Controllers\Api\TelegramWebhook;
use Illuminate\Support\Facades\Route;

/**
 * Обработка Telegram webhooks
 */
Route::post('/webhook/'.config('services.telegram_bot.route_token'), TelegramWebhook::class)->name('telegram.webhook');

/**
 * Аутентификация с получением токена доступа
 */
Route::post('/login', GetAuthToken::class)->name('login');

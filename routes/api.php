<?php

use App\Http\Controllers\Api\GetAuthToken;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\RegisterTelegramWebhook;
use App\Http\Controllers\Api\RemoveTelegramWebhook;
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

/**
 * Получение всех входящих сообщений
 */
Route::get('/messages', [MessageController::class, 'index'])
    ->name('messages.index')
    ->middleware('auth:sanctum');

/**
 * Отправка сообщения контакту
 */
Route::post('/messages', [MessageController::class, 'sendMessage'])
    ->name('messages.store')
    ->middleware('auth:sanctum');

/**
 * Регистрация Telegram webhook URL
 */
Route::get('/register-webhook', RegisterTelegramWebhook::class)
    ->name('register.webhook')
    ->middleware('auth:sanctum');

/**
 * Удаление Telegram webhook URL
 */
Route::get('/remove-webhook', RemoveTelegramWebhook::class)
    ->name('remove.webhook')
    ->middleware('auth:sanctum');

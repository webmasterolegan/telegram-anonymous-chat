<?php

namespace App\Providers;

use App\Actions\RegisterTelegramBotWebhookAction;
use App\Actions\RemoveTelegramBotWebhookAction;
use App\Actions\SendMessageToContactAction;
use App\Contracts\RegisterTelegramBotWebhookContract;
use App\Contracts\RemoveTelegramBotWebhookContract;
use App\Contracts\SendMessageToContactContract;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $bindings = [
        SendMessageToContactContract::class => SendMessageToContactAction::class,
        RegisterTelegramBotWebhookContract::class => RegisterTelegramBotWebhookAction::class,
        RemoveTelegramBotWebhookContract::class => RemoveTelegramBotWebhookAction::class,
    ];

    public function provides(): array
    {
        return [
            SendMessageToContactContract::class,
            RegisterTelegramBotWebhookContract::class,
            RemoveTelegramBotWebhookContract::class,
        ];
    }
}

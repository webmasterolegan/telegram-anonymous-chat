<?php

namespace App\Providers;

use App\Actions\RegisterTelegramBotWebhookAction;
use App\Actions\RemoveTelegramBotWebhookAction;
use App\Contracts\RegisterTelegramBotWebhookContract;
use App\Contracts\RemoveTelegramBotWebhookContract;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $bindings = [
        RegisterTelegramBotWebhookContract::class => RegisterTelegramBotWebhookAction::class,
        RemoveTelegramBotWebhookContract::class => RemoveTelegramBotWebhookAction::class,
    ];

    public function provides(): array
    {
        return [
            RegisterTelegramBotWebhookContract::class,
            RemoveTelegramBotWebhookContract::class,
        ];
    }
}

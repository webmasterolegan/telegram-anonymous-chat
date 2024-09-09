<?php

namespace App\Console\Commands;

use App\Contracts\RegisterTelegramBotWebhookContract;
use Illuminate\Console\Command;

class RegisterTelegramBotWebhook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:register-telegram-bot-webhook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Регистрация URL получения webhook от Telegram';

    /**
     * Execute the console command.
     */
    public function handle(RegisterTelegramBotWebhookContract $registerAction)
    {
        try {
            $registerAction();

            $this->info('Webhook успешно зарегистрирован');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

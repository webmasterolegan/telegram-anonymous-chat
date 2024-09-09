<?php

namespace App\Console\Commands;

use App\Contracts\RemoveTelegramBotWebhookContract;
use Illuminate\Console\Command;

class RemoveTelegramBotWebhook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remove-telegram-bot-webhook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Удаление URL получения webhook от Telegram';

    /**
     * Execute the console command.
     */
    public function handle(RemoveTelegramBotWebhookContract $removeAction)
    {
        try {
            $removeAction();

            $this->info('Webhook успешно удалён');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

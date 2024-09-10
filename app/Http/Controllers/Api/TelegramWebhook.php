<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\TelegramBotWebhook;
use App\Models\Contact;
use App\Models\Message;

/**
 * Обработка Telegram webhooks
 */
class TelegramWebhook
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(TelegramBotWebhook $request)
    {
        $webhookData = $request->validated();

        $messageContactData = $webhookData['message']['from'];
        unset($messageContactData['is_bot']);

        $messageContactData = [
            ...$messageContactData,
            'chat_id' => $messageContactData['id'],
        ];

        $contact = Contact::firstOrCreate(
            ['chat_id' => $messageContactData['chat_id']],
            $messageContactData
        );

        if ($contact && isset($webhookData['message']['text'])) {
            Message::create([
                'contact_id' => $contact->id,
                'text' => $webhookData['message']['text'],
            ]);
        }

        return response('', 200);
    }
}

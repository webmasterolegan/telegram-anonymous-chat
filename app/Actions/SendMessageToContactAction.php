<?php

namespace App\Actions;

use App\Contracts\SendMessageToContactContract;
use App\Dtos\MessageToSendDto;
use App\Enums\MessageDirectionEnum;
use App\Models\Contact;
use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class SendMessageToContactAction implements SendMessageToContactContract
{
    public function __invoke(MessageToSendDto $messageDto): JsonResponse
    {
        $chat_id = Contact::whereId($messageDto->contact_id)->pluck('chat_id')->first();

        if (! $chat_id) {
            return response()->json([
                'status' => false,
                'message' => __('messages.contact_not_found'),
            ], 404);
        }

        $url = getTelegramApiUrl().'/sendMessage';

        $response = Http::post($url, [
            'chat_id' => $chat_id,
            'text' => $messageDto->text,
        ]);

        $result = $response->json();

        // Успешная отправка сообщения
        if ($response->successful() && $result['ok']) {
            // Сохраняем только успешно отправленные сообщения
            Message::create([
                ...(array) $messageDto,
                'direction' => MessageDirectionEnum::OUTGOING,
            ]);

            return response()->json([
                'status' => true,
                'message' => __('messages.send_success'),
            ], 201);
        }

        if (isset($result['error_code']) && isset($result['description'])) {
            return response()->json([
                'status' => false,
                'message' => __('messages.telegram_send_error', [
                    'CODE' => $result['error_code'],
                    'DESCRIPTION' => $result['description'],
                ]),
            ], $result['error_code']);
        }

        return response()->json([
            'status' => false,
            'message' => __('messages.send_error'),
        ], 500);
    }
}

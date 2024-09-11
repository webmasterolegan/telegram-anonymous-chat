<?php

namespace App\Http\Controllers\Api;

use App\Contracts\SendMessageToContactContract;
use App\Dtos\MessageToSendDto;
use App\Http\Requests\SendMessageRequest;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MessageController
{
    /**
     * Получить все сообщения
     */
    public function index(): AnonymousResourceCollection
    {
        return MessageResource::collection(
            Message::with('contact:id,username,created_at', 'user')
                ->orderByDesc('id')
                ->paginate(50)
        );
    }

    /**
     * Отправить сообщение контакту
     */
    public function sendMessage(
        SendMessageRequest $request,
        SendMessageToContactContract $sendMessageAction
    ): JsonResponse {
        return $sendMessageAction(new MessageToSendDto($request->user()->id, ...$request->validated()));
    }
}

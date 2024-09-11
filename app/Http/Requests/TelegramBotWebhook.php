<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Валидация Telegram webhook
 */
class TelegramBotWebhook extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'update_id' => 'required|numeric',
            'message' => 'required|array',

            'message.message_id' => 'required|numeric',

            'message.from' => 'required|array',
            'message.from.id' => 'required|numeric',
            'message.from.is_bot' => 'required',
            'message.from.first_name' => 'string',
            'message.from.last_name' => 'string',
            'message.from.username' => 'string',
            'message.from.language_code' => 'string',

            'message.chat' => 'required|array',
            'message.chat.id' => 'required|numeric',
            'message.chat.first_name' => 'string',
            'message.chat.last_name' => 'string',
            'message.chat.username' => 'required|string',
            'message.chat.type' => 'required|string',

            'message.date' => 'required|numeric',
            'message.text' => 'string',
        ];
    }
}

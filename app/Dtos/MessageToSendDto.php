<?php

namespace App\Dtos;

/**
 * DTO сообщения для отправки контакту
 */
readonly class MessageToSendDto
{
    public function __construct(
        public int $user_id,
        public int $contact_id,
        public string $text
    ) {}
}

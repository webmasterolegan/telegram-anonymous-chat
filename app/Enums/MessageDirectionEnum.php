<?php

namespace App\Enums;

/**
 * Типы сообщений (Входящее или Исходящее)
 */
enum MessageDirectionEnum: int
{
    use Traits\GetEnumData;

    /**
     * Входящее сообщение (Автор Контакт Telegram бота)
     */
    case INCOMING = 0;

    /**
     * Исходящее сообщение (Автор Пользователь сервиса)
     */
    case OUTGOING = 1;
}

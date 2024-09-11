<?php

namespace App\Contracts;

use App\Dtos\MessageToSendDto;
use Illuminate\Http\JsonResponse;

interface SendMessageToContactContract
{
    public function __invoke(MessageToSendDto $message): JsonResponse;
}

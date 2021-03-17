<?php

namespace App\Lib\Texting;

use App\Models\TextMessage;

interface TextingApi
{
    /**
     * Send a text message.
     *
     * @param TextMessage $message
     */
    public function send(TextMessage $message): void;
}

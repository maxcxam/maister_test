<?php

namespace App\Services;

use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramService
{
    private $chat_id = '-4558401689';
    private $telegram;

    public function __construct()
    {
        $this->telegram = Telegram::bot();
    }

    public function sendMessage($message)
    {
        $this->telegram->sendMessage([
            'chat_id' => $this->chat_id,
            'text' => $message,
        ]);
    }

    public function sendJsonFile($jsonData, $fileName = 'data.json', $message = '')
    {
        $tempFile = sys_get_temp_dir() . '/' . $fileName;

        file_put_contents($tempFile, json_encode($jsonData, JSON_PRETTY_PRINT));

        $fileResource = fopen($tempFile, 'r');

        $this->telegram->sendDocument([
            'chat_id' => $this->chat_id,
            'document' => $fileResource,
            'caption' => $message,
        ]);

        unlink($tempFile);
    }
}

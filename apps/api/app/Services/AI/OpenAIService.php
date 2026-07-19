<?php

namespace App\Services\AI;

class OpenAIService
{
    public function chat(string $message): string
    {
        return "Recebi sua mensagem: {$message}";
    }
}
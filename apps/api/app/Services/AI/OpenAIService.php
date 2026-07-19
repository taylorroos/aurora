<?php

namespace App\Services\AI;

use OpenAI\Laravel\Facades\OpenAI;
use Throwable;

class OpenAIService
{
    public function chat(string $message): string
    {
        return match (true) {
            str_contains(strtolower($message), 'oi') =>
                'Olá! Eu sou a Aurora. Como posso ajudar você?',

            str_contains(strtolower($message), 'tchau') =>
                'Até logo!',

            default =>
                "Recebi sua mensagem: {$message}",
        };
    }
}
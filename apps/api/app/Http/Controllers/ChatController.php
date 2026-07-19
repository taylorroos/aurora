<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatRequest;
use App\Services\AI\OpenAIService;

class ChatController extends Controller
{
    public function __construct(
        protected OpenAIService $openAI,
    ) {
    }

    public function __invoke(ChatRequest $request)
    {
        return response()->json([
            'message' => $this->openAI->chat(
                $request->validated('message')
            ),
        ]);
    }
}
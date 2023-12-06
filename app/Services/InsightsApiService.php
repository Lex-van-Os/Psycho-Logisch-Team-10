<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class InsightsApiService
{
    public function generateSummary($answers, $reflectionId)
    {
        try {
            Log::info($answers);
            Log::info($reflectionId);
            Log::info(auth()->user()->id);
            Http::post('http://127.0.0.1:5000/psychoLogischInsights/summarizeReflection', [
                'answers' => $answers,
                'reflection_id' => $reflectionId,
                'user_id' => auth()->user()->id,
            ])->background();
        } catch (\Exception $exception) {
            logger()->error('Error while making external API request: ' . $exception->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
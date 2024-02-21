<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StudyTrajectory;
use App\Services\InsightsApiService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Queueable;
use OpenAI\Client;
use \Hyperf\Support;

class InsightsController extends Controller
{

    public function generateReflectionSummary(Request $request)
    {
        try
        {
            Log::info("generateReflectionSummary");
            $reflectionId = $request->input('reflectionId');

            $reflectionController = new ReflectionsController();

            $userId = auth()->user()->id;

            $answers = $reflectionController->getQuestionAnswerValuePairs($userId, $reflectionId);

            if ($answers)
            {
                Log::info($answers);

                /*dispatch(function () use ($answers, $reflectionId) {
                    $insightsService = new InsightsApiService();
                    $insightsService->generateSummary($answers, $reflectionId);
                })->afterResponse();*/

                try {
                    dispatch(function () use ($answers, $reflectionId) {
                        $insightsService = new InsightsApiService();
                        $insightsService->generateSummary($answers, $reflectionId);
                    });
                }catch (Exception $e){
                    return response()->json(['error' => 'Internal Server Error'], 500);
                }
                return response()->json(200);
            }
            else
            {
                return response()->json(['error' => 'No answers could be found'], 404);
            }
        }
        catch (Exception $ex)
        {
            Log::error('An error occurred: ' . $ex->getMessage());
            return response()->json(['error' => 'An error occurred'], 500); // Internal Server Error
        }
    }

    public function insightsGetAnswersArray($id){
        $reflectionController = new ReflectionsController();

        $userId = auth()->user()->id;

        $answers = $reflectionController->getQuestionAnswerValuePairs($userId, $id);
        return response()->json($answers);
    }

    public function generateReflectionSummaryOpenAI(Request $request)
    {
        try
        {
            Log::info("generateReflectionSummary");
            $reflectionId = $request->input('reflectionId');

            $reflectionController = new ReflectionsController();

            $userId = auth()->user()->id;

            $answers = $reflectionController->getQuestionAnswerValuePairs($userId, $reflectionId);

            if ($answers)
            {
                Log::info($answers);

                /*dispatch(function () use ($answers, $reflectionId) {
                    $insightsService = new InsightsApiService();
                    $insightsService->generateSummary($answers, $reflectionId);
                })->afterResponse();*/

                try {
                    /*dispatch(function () use ($answers, $reflectionId) {
                        $insightsService = new InsightsApiService();
                        $insightsService->generateSummary($answers, $reflectionId);
                    });*/

                    $client = \OpenAI::factory()
                        ->withBaseUri(env('OPENAI_API_BASE').'/openai/deployments/'.env('DEPLOYMENT_NAME'
                            ))
                        ->withHttpHeader('api-key',env('AZURE_OPENAI_API_KEY'))
                        ->withQueryParam('api-version',env('OPENAI_API_VERSION'))
                        ->make();

                    $result = $client->completions()->create([

                    ]);

                }catch (Exception $e){
                    return response()->json(['error' => 'Internal Server Error'], 500);
                }
                return response()->json(200);
            }
            else
            {
                return response()->json(['error' => 'No answers could be found'], 404);
            }
        }
        catch (Exception $ex)
        {
            Log::error('An error occurred: ' . $ex->getMessage());
            return response()->json(['error' => 'An error occurred'], 500); // Internal Server Error
        }
    }

    public function formatSummaryPostData($answers)
    {

    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\open_answer;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class OpenAnswerController extends Controller
{
    // Method for retrieving a single open answer
    public function get($id) 
    {
        try 
        {
            $openAnswer = $this->getOpenAnswer($id);
    
            return response()->json(['open_answer' => $openAnswer], 200); 
        }
        catch (ModelNotFoundException $e) {
            // Handle the case where the open answer is not found.
            return response()->json(['error' => 'Open answer not found'], 404); // Not Found
        }
        catch (ValidationException $e)
        {
            // Handle validation errors
            return response()->json(['error' => $e->validator->getMessageBag()], 422); // Unprocessable Entity
        }
        catch (\Exception $e)
        {
            // Handle other exceptions
            Log::error('An error occurred: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred'], 500); // Internal Server Error
        }
    }

    // Method for creating an open answer
    public function store(Request $request) 
    {
        try 
        {
            $request->validate([
                "question_id" => "required",
                "answer" => "required",
            ]);
    
            Log::info("Storing question answer");
    
            $answer = $request->input("answer");
            $questionId = $request->input("question_id");

            $answerController = new AnswerController();    
            $result = $answerController->createOpenAnswer($questionId, $answer);
        
            return response()->json($result);
        } catch (ValidationException $e) {
            // Handle validation errors
            return response()->json(['error' => $e->validator->getMessageBag()], 422); // Unprocessable Entity
        } catch (\Exception $e) {
            // Handle other exceptions
            Log::error('An error occurred: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred'], 500); // Internal Server Error
        }
    }

    // Method for updating an open answer
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                "answer" => "required",
            ]);

            $answer = $request->input("answer");

            // Check if the answer exists
            $existingAnswer = $this->getOpenAnswer($id);

            if (!$existingAnswer) {
                return response()->json(['error' => 'Answer not found'], 404); // Not Found
            }

            $existingAnswer->value = $answer;
            $existingAnswer->save();

            return response()->json($existingAnswer);
        } catch (ValidationException $e) {
            // Handle validation errors
            return response()->json(['error' => $e->validator->getMessageBag()], 422); // Unprocessable Entity
        } catch (\Exception $e) {
            // Handle other exceptions
            Log::error('An error occurred: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred'], 500); // Internal Server Error
        }
    }

    // Method for deleting an open answer
    public function destroy($id)
    {
        try {
            $openAnswer = open_answer::findOrFail($id);
            $openAnswer->delete();
    
            return response()->json(['message' => 'Open answer deleted successfully'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Open answer not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }

    // Method for retrieving an open answer (re-usable internal method for both GET requests / validation)
    public function getOpenAnswer($id)
    {
        $openAnswer = open_answer::findOrFail($id);

        return $openAnswer;

    }
}

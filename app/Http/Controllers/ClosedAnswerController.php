<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\question_option;
use App\ViewModels\ClosedAnswerViewModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\closed_answer;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class ClosedAnswerController extends Controller
{
    // Method for retrieval of a single closed answer
    public function get($id) 
    {
        try 
        {
            $closedAnswer = $this->getClosedAnswerWithOption($id);
    
            return response()->json($closedAnswer, 200); 
        }
        catch (ModelNotFoundException $e) {
            // Handle the case where the open answer is not found.
            return response()->json(['error' => 'Closed answer not found'], 404); // Not Found
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

    // Method for storing a closed answer
    public function store(Request $request) 
    {
        try 
        {
            $request->validate([
                "question_id" => "required",
                "question_option_id" => "required",
            ]);
        
            $questionId = $request->input("question_id");
            $questionOptionId = $request->input("question_option_id");

            $answerController = new AnswerController();

            $result = $answerController->createClosedAnswer($questionId, $questionOptionId);
        
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

    // Method for updating a closed answer
    public function update(Request $request, $id) 
    {
        try 
        {
            $request->validate([
                "question_option_id" => "required",
            ]);
        
            $questionOptionId = $request->input("question_option_id");

            $retrievedAnswer = $this->getClosedAnswer($id);

            $retrievedAnswer->question_option_id = $questionOptionId;
            $retrievedAnswer->save();
        
            return response()->json($retrievedAnswer);
        } catch (ValidationException $e) {
            // Handle validation errors
            return response()->json(['error' => $e->validator->getMessageBag()], 422); // Unprocessable Entity
        } catch (\Exception $e) {
            // Handle other exceptions
            Log::error('An error occurred: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred'], 500); // Internal Server Error
        }
    }

    // Method for deleting a closed answer
    public function destroy($id)
    {
        try {
            $openAnswer = closed_answer::findOrFail($id);
            $openAnswer->delete();
    
            return response()->json(['message' => 'Closed answer deleted successfully'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Closed answer not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }

    // Method for retrieving a closed answer with selected option (useful for front-end)
    function getClosedAnswerWithOption($id)
    {
        $closedAnswer = closed_answer::with('question_option')->findOrFail($id);

        $parsedAnswer = new ClosedAnswerViewModel(
            $closedAnswer->id,
            $closedAnswer->question_id,
            $closedAnswer->question_option_id,
            $closedAnswer->question_option->text,
            $closedAnswer->question_option->value
        );

        return $parsedAnswer;
    }

    // Method for retrieving a closed answer without its options (used mainly for internal validation of existing object)
    function getClosedAnswer($id)
    {
        $closedAnswer = closed_answer::findOrFail($id);

        return $closedAnswer;
    } 
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\closed_answer;
use App\Models\open_answer;
use App\Models\question_option;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AnswerController extends Controller
{
    public function show() 
    {
        return view("");
    }

    public function edit() 
    {
        return view("");
    }

    // Read CRUD method
    public function get() 
    {
        return csrf_token(); 
    }

    // Create CRUD method
    public function store(Request $request) 
    {
        try 
        {
            $request->validate([
                "question_id" => "required",
                "answer" => "required",
                "type" => "required"
            ]);
    
            Log::info("Storing question answer");
    
            $result = null;
            $answerType = $request->input("type");
            $answer = $request->input("answer");
            $questionId = $request->input("question_id");
    
            if ($answerType == "Open") 
            {
                $result = $this->createOpenAnswer($questionId, $answer);
            }
            else if ($answerType == "Closed") 
            {
                $questionController = new QuestionController();
    
                $questionOptions = $questionController->getQuestionOptions($questionId);
                $questionOptionId = $this->getQuestionOptionByValue($questionOptions, $answer);
    
                $result = $this->createClosedAnswer($questionId, $questionOptionId);
            }
    
            Log::info("Foo");
    
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

    // Update CRUD method
    public function update(Request $request) 
    {
        $request->validate([
            "question_id" => "required",
            "answer" => "required",
            "type" => "required"
        ]);

        Log::info("Updating question answer");

        $result = null;
        $answerType = $request->input("type");
        $answer = $request->input("answer");
        $questionId = $request->input("question_id");

        if ($answerType == "Open") 
        {
            $result = $this->createOpenAnswer($questionId, $answer);
        }
        else if ($answerType == "Closed") 
        {
            $questionController = new QuestionController();

            $questionOptions = $questionController->getQuestionOptions($questionId);
            $questionOptionId = $this->getQuestionOptionByValue($questionOptions, $answer);

            $result = $this->createClosedAnswer($questionId, $questionOptionId);
        }


        Log::info("Foo");

        return response()->json($result);
    }

    // Delete CRUD method
    public function destroy() 
    {

    }

    public function getQuestionOptionByValue($questionOptions, $value)
    {
        foreach ($questionOptions as $option)
        {
            if ($option->value == $value)
            {
                return $option->id;
            }
        }

        return null;
    }

    public function createClosedAnswer($questionId, $questionOptionsId) 
    {
        $closedAnswer = closed_answer::create([
            "question_id" => $questionId,
            "question_option_id" => $questionOptionsId
        ]);

        return $closedAnswer;
    }

    public function createOpenAnswer($questionId, $value)
    {
        $closedAnswer = open_answer::create([
            "question_id" => $questionId,
            "value" => "1"
        ]);

        return $closedAnswer;
    }
}

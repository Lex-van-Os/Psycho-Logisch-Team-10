<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\closed_answer;
use App\Models\open_answer;
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
        $request->validate([
            "question_id" => "required",
            "answer" => "required",
            "type" => "required"
        ]);

        $answerType = $request->input("type");
        $answer = $request->input("answer");
        $questionId = $request->input("question_id");

        if ($answerType == "Open") 
        {
            $result = $this->createOpenAnswer($questionId, $answer);
        }
        else if ($answerType == "Closed") 
        {
            $questionOptions = $this->getQuestionOptions($questionId);
            $result = $this->createClosedAnswer($questionId, $questionOptions->id);
        }


        Log::info("Foo");

        return response()->json("Foo");
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

    public function getQuestionOptions($questionId)
    {

    }

    // Update CRUD method
    public function update(Request $request) 
    {
        
    }

    // Delete CRUD method
    public function destroy() 
    {

    }
}

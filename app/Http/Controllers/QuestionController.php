<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\question;
use App\Models\question_option;
use App\Models\reflection_question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // Method for retrieving all question options for a multiple choice question
    public function retrieveQuestionOptions($questionId)
    {
        // Retrieve all question options linked to the specified questionId
        $questionOptions = question_option::where('question_id', $questionId)->get();

        return $questionOptions;
    }
    //

    //Method for retrieving a question by id
    public function retrieveQuestion($id)
    {
        $question = question::findOrFail($id);
        return $question;
    }
    
    public function generateReflectionQuestions($reflectionId, $referenceType)
    {
        $questionsToLink = null;

        $questionsToLink = question::where('ref_type', $referenceType)->pluck('id');

        foreach ($questionsToLink as $questionId) 
        {
            reflection_question::create([
                'reflection_id' => $reflectionId,
                'question_id' => $questionId,
            ]);
        }
    }
}

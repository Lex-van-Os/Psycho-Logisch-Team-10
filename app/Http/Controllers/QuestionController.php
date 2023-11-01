<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\question_option;
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
}

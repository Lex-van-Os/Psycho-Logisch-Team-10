<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\closed_answer;
use App\Models\open_answer;
use App\Models\question_option;
use App\Models\reflection_question;
use App\ViewModels\SummaryAnswerViewModel;
use App\ViewModels\SummaryQuestionViewModel;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

    // Method for storing either an open or closed answer, based on given type
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
            $questionType = $request->input("type");
            $answer = $request->input("answer");
            $questionId = $request->input("question_id");
    
            if ($questionType == "open_question" || $questionType == "scale_question") 
            {
                $result = $this->createOpenAnswer($questionId, $answer);
            }
            else if ($questionType == "multiple_choice_question") 
            {
                $questionController = new QuestionController();
    
                $questionOptions = $questionController->retrieveQuestionOptions($questionId);
                $questionOptionId = $this->getQuestionOptionByTextValue($questionOptions, $answer);
    
                Log::info("Storing closed answer");
                if (isset($questionOptionId)) 
                {
                    $result = $this->createClosedAnswer($questionId, $questionOptionId);
                }
                else
                {
                    return response()->json(['error' => 'Could not find corresponding question option'], 422); 
                }
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

    // Method for finding the given multiple choice question option by checking corresponding value
    public function getQuestionOptionByTextValue($questionOptions, $value)
    {
        Log::info($questionOptions);
        foreach ($questionOptions as $option)
        {
            if (intval($option->text) == intval($value))
            {
                return $option->id;
            }
        }

        return null;
    }

    // Method for creating a closed answer
    public function createClosedAnswer($questionId, $questionOptionsId) 
    {
        Log::info($questionId);
        Log::info($questionOptionsId);

        $closedAnswer = closed_answer::create([
            "question_id" => $questionId,
            "question_option_id" => $questionOptionsId
        ]);

        return $closedAnswer;
    }

    // Method for creating an open answer
    public function createOpenAnswer($questionId, $value)
    {
        $openAnswer = open_answer::create([
            "question_id" => $questionId,
            "value" => $value
        ]);

        return $openAnswer;
    }

    public function retrieveQuestionsWithAnswers($reflectionId, $userId) {
        $reflectionQuestions = reflection_question::with(['question.question_open_answers', 'question.question_closed_answers'])
        ->where('reflection_id', $reflectionId)
        ->get();

        $questions = $reflectionQuestions->map(function ($reflectionQuestion) use ($userId) {
            $question = $reflectionQuestion->question;
            $answers = $question->type === 'open_question' ? $question->question_open_answers : $question->question_closed_answers;

            $filteredAnswers = $answers->where('user_id', $userId);

            $answer = $filteredAnswers->first();
            $answerId = null;

            if ($answer) 
            {
                $answerId = $answer->id;
            }
            else 
            {
                $answerId = 0;
            }

            return new SummaryQuestionViewModel(
                $question->id,
                $answerId,
                $question->title,
            );
        });

        return $questions;
    }
    public function getSharedAnswers()
    {
        try 
        {
            $sharedOpenAnswers = open_answer::where('shared', true)
            ->select('id', 'value')
            ->get();

            return response()->json($sharedOpenAnswers);
        } 
        catch (\Exception $e) {
            // Handle other exceptions
            Log::error('An error occurred: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred'], 500); // Internal Server Error
        } 
    }
}

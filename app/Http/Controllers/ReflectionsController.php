<?php

namespace App\Http\Controllers;

use App\Models\closed_answer;
use App\Models\open_answer;
use App\Models\question;
use App\Models\Reflection;
use App\Models\reflection_progression;
use App\Models\reflection_question;
use App\Models\reflection_trajectory;
use App\ViewModels\SummaryAnswerViewModel;
use Illuminate\Http\Request;
use Laravel\Prompts\Progress;
use Illuminate\Support\Facades\Log;

class ReflectionsController extends Controller
{
    /**
     * @param $type
     * @param $index
     * @param $reflection_id
     * @return void
     *
     * W.I.P function for the questions navbar to go back and forth
     */
    public function navigateToQuestion($type, $index, $reflection_id)
    {
        //Get Questions
        $questions = question::where('type', '=' ,$type);
        //Get reflection question by type and index
        $question = $questions[$index];
        //Get Progress
        $progress = reflection_progression::where('reflection_id', '=', $reflection_id)->first();
        //Get saved answer if reflection_progress is higher
        if($index >= $progress->progress)
        {
            switch ($questions->type)
            {
                case 'open_question':
                    $open_answer = open_answer::where([['question_id', '=', $question->id],
                        ], ['reflection_id', '=', $reflection_id]);
                    break;
                case 'scale_question' || 'multiple_choice_question':
                    break;
            }
        }
        //return data in reflection Question view
    }

    //method to get a reflection_trajectory by reflection id
    public function getReflectionTrajectoryByReflectionID($reflection_id) : reflection_trajectory
    {
        $reflection=Reflection::find($reflection_id);
        return reflection_trajectory::find($reflection->reflection_trajectory_id);
    }

    /** A method to receive and store an open question answer
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function AnswerOpenQuestion(Request $request)
    {
        $request->validate([
            'answer'=>['max:3000']
        ]);
        $reflection_id = $request->reflection_id;
        $question_id = $request->question_id;
        $answer = $request->answer;
        open_answer::create([
            'value' => $answer,
            'question_id' => $question_id,
            'reflection_id'=>$reflection_id,
            'user_id'=>\Auth::id()
        ]);
        $ref = reflection_progression::where('reflection_id', '=', $reflection_id)->first();
        $ref->progress += 1;
        $ref->save();

        //redirect back to questions
        $reflection=Reflection::find($reflection_id);
        return redirect('/reflectionTrajectory/'.$this->getReflectionTrajectoryByReflectionID($reflection_id)->id.'/'.$reflection->reflection_type);
    }

    /** Method to receive and store a multiple choice question answer
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application
     */
    public function AnswerMultiQuestion(Request $request)
    {
        $reflection_id = $request->reflection_id;
        $question_id = $request->question_id;
        $answer_id = $request->option_id;
        closed_answer::create([
            'question_id' => $question_id,
            'question_option_id' => $answer_id,
            'reflection_id'=>$reflection_id,
            'user_id'=>\Auth::id()
        ]);
        $ref = reflection_progression::where('reflection_id', '=', $reflection_id)->first();
        $ref->progress += 1;
        $ref->save();

        //redirect back to questions
        $reflection=Reflection::find($reflection_id);
        $ref_traj_id = reflection_trajectory::find($reflection->reflection_trajectory_id)->id;
        return redirect('/reflectionTrajectory/'.$ref_traj_id.'/'.$reflection->reflection_type);
    }

    /**Method to get a question by type and index
     * @param $type string past, present, future
     * @param $questionIndex int index in vragen lijst.
     */
    public function getQuestionByIndex($type,$questionIndex)
    {
        //Check if end of questionaire
        $questions = question::where('ref_type','=',$type)->get();
        if(isset($questions[$questionIndex])){
            return $questions[$questionIndex];
        }else return null;
    }

    /*Check type of reflection and get it
     *      Check if reflection already started
     *          Start if not
     *      Continue reflection if already started
     * */
    /** Main function for starting/resuming reflections
     * @param $id reflection_trajectory
     * @param $type string past, present, future
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|void
     */
    public function indexFromReflectiontrajectory($id, $type)
    {
        $reflection = Reflection::where([['reflection_trajectory_id','=',$id], ['reflection_type','=',$type]])->first();
        if(reflection_question::where('reflection_id','=',$reflection->id)->count() == 0)
        {
            return $this->StartReflection($ref->id,$type);
        }else{
            $progress = $reflection->reflection_progression()->first();

            if ($progress == null)
            {
                $progress = new reflection_progression([
                    'progress' => 0,
                    'reflection_id' => $reflection->id
                ]);
            }

            $question = $this->getQuestionByIndex($type,$progress->progress);
            //check if the questionare is finished
            if(!isset($question))
            {
                $answerController = new AnswerController();
                $userId = auth()->user()->id;

                $summaryQuestions = $answerController->retrieveQuestionsWithAnswers($reflection->id, $userId);

                return view('reflectionSummary', ['questions' => $summaryQuestions, 'reflection_id' => $reflection->id]);
            }
            if($question->type=='multiple_choice_question')
            {
                $questionOptions = $question->question_options()->get();
                return view('reflectionQuestions', ['progression'=>$progress, 'questionCount'=>question::where('ref_type','=',$type)->count(),'question'=>$question, 'questionOptions'=>$questionOptions, 'ref_id' => $reflection->id]);
            }else return view('reflectionQuestions', ['progression'=>$progress,'questionCount'=>question::where('ref_type','=',$type)->count(),'question'=>$question, 'ref_id' => $reflection->id]);
        }
    }

    /**Starts a created reflection using a reflection id and reflection type
     * @param $id /reflection id(not reflection_trajectory)
     * @param $type /reflection_type (past, present, future)
     * @return void
     */
    public function StartReflection($id, $type)
    {
        $qid = 0;
        switch ($type){
            case 'past':
                $qid = 2;
                break;
            case 'present':
                $qid = 38;
                break;
            case 'future':
                $qid = 44;
                break;
        }
        reflection_question::create([
            'reflection_id' => $id,
            'question_id' => $qid,
        ]);
        $reflection_progress = reflection_progression::create(['reflection_id' => $id, 'progress' => 0]);
        $qi=$this->getQuestionByIndex($type, 0);
        if($qi->type=='multiple_choice_question')
        {
            $questionOptions = $qi->question_options()->get();
            return view('reflectionQuestions', ['progression'=>$reflection_progress, 'questionCount'=>question::where('ref_type','=',$type)->count(),'question'=>$qi, 'questionOptions'=>$questionOptions, 'ref_id' => $id]);
        }else return view('reflectionQuestions', ['progression'=>$reflection_progress, 'questionCount'=>question::where('ref_type','=',$type)->count(),'question'=>$qi, 'ref_id' => $id]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse'
     */
    public function getQuestionWithAnswer(Request $request)
    {
        try
        {
            Log::info("getQuestionWithAnswer");
            $questionId = $request->query('questionId');
            $answerId = $request->query('answerId');

            $question = question::with(['question_open_answers', 'question_closed_answers'])->where('id', $questionId)->first();
            $questionAnswer = null;

            if ($question->type == 'open_question' || $question->type == 'scale_question')
            {
                $questionAnswer = $question->question_open_answers->where('id', $answerId)->first();
            }
            else if ($question->type == 'multiple_choice_question')
            {
                $closedAnswer = $question->question_closed_answers->where('id', $answerId)->first();

                $questionAnswer = $closedAnswer->question_option->value;
            }

            if ($questionAnswer)
            {
                $answer = new SummaryAnswerViewModel(
                    $question->title,
                    $questionAnswer->value
                );

                return response()->json(['answer' => $answer]);
            }
            else
            {
                return response()->json(['answer' => null]);
            }
        }
        catch (\Exception $e) {
            // Handle other exceptions
            Log::error('An error occurred: ' . $e->getMessage());
            Log::error($e->getTrace());
            return response()->json(['error' => 'An error occurred'], 500); // Internal Server Error
        }
    }

    public function getQuestionAnswerValuePairs($userId, $reflectionId) 
    {
        $reflectionQuestions = reflection_question::with(['question.question_open_answers', 'question.question_closed_answers'])
        ->where('reflection_id', $reflectionId)
        ->get();

        $questionAnswers = $reflectionQuestions->map(function ($reflectionQuestion) use ($userId) {
            $question = $reflectionQuestion->question;
            $answers = $question->type === 'open_question' ? $question->question_open_answers : $question->question_closed_answers;

            $filteredAnswers = $answers->where('user_id', $userId);

            $answer = $filteredAnswers->first();

            if ($answer)
            {
                return new SummaryAnswerViewModel(
                    $question->title,
                    $answer->value,
                );
            }
        });

        return $questionAnswers;
    }

    public function getQuestionsWithAnswers(Request $request)
    {
        try 
        {
            $reflectionId = $request->query('reflectionId');
            $userId = $request->query('userId');
    
            $questionAnswers = $this->getQuestionAnswerValuePairs($reflectionId, $userId);

            return $questionAnswers;
        }
        catch (\Exception $e) {
            // Handle other exceptions
            Log::error('An error occurred: ' . $e->getMessage());
            Log::error($e->getTrace());
            return response()->json(['error' => 'An error occurred'], 500); // Internal Server Error
        }
    }

}

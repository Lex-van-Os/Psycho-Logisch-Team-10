<?php

namespace App\Http\Controllers;
use App\Models\Reflection;
use App\Models\reflection_question;
use App\Models\reflection_trajectory;
use App\ViewModels\SummaryQuestionViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReflectionsTrajectoryController extends Controller
{
    public function showAll()
    {
        if(\Auth::check()){
            return view('welcome', ['ref_trajs' => reflection_trajectory::where('user_id', '=', \Auth::id())->get(), 'uid' => \Auth::id()]);
        }else return view('welcome');
    }

    public function showSummary($id)
    {
        $user = auth()->user();
        $userId = $user->id;

        $answerController = new AnswerController();
        $questions = $answerController->retrieveQuestionsWithAnswers($id, $userId);
        
        $reflection_id = $id;

        return view('reflectionSummary', compact('questions', 'reflection_id'));
    }

    public function showTrajectory($id)
    {
        return view('Reflection', ['ref'=>reflection_trajectory::findOrFail($id)]);
    }

    public function retrieveAll()
    {
        return reflection_trajectory::all();
    }

    public function store(Request $request)
    {
        $ref_trad = reflection_trajectory::create(['title' => $request->title, 'user_id' => \Auth::id()]);
        Reflection::create(['reflection_trajectory_id' => $ref_trad->id, 'reflection_type' => 'past']);
        Reflection::create(['reflection_trajectory_id' => $ref_trad->id, 'reflection_type' => 'present']);
        Reflection::create(['reflection_trajectory_id' => $ref_trad->id, 'reflection_type' => 'future']);
        return redirect('/');
    }

    //Method to retrieve a reflection trajectory
    public function retrieveReflectionTrajectory($id)
    {

        return reflection_trajectory::where(['id' => $id])->get();
    }
}

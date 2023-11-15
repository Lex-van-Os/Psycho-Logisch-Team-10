<?php

namespace App\Http\Controllers;
use App\Models\Reflection;
use App\Models\reflection_question;
use App\Models\reflection_trajectory;
use App\ViewModels\SummaryAnswerViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReflectionsTrajectoryController extends Controller
{
    public function showAll()
    {
        return view('welcome', ['ref_trajs' => reflection_trajectory::all()]);
    }

    public function showSummary($id)
    {
        $reflectionQuestions = reflection_question::with(['question.question_open_answers', 'question.question_closed_answers'])
            ->where('reflection_id', $id)
            ->get();

        $questions = $reflectionQuestions->map(function ($reflectionQuestion) {
            $question = $reflectionQuestion->question;
            $answer = $question->type === 'open' ? $question->openAnswer : $question->closedAnswer;

            return new SummaryAnswerViewModel(
                $question->id,
                $question->title,
                $answer ? $answer->text : null,
                $question->type
            );
        });

        return view('reflectionSummary', compact('questions'));
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
        $ref_trad = reflection_trajectory::create(['title' => $request->title, 'user_id' => '1']);
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

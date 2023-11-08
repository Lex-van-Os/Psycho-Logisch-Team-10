<?php

namespace App\Http\Controllers;

use App\Models\closed_answer;
use App\Models\question;
use App\Models\Reflection;
use App\Models\reflection_progression;
use App\Models\reflection_question;
use App\Models\reflection_trajectory;
use Illuminate\Http\Request;

class ReflectionsController extends Controller
{

    public function AnswerMultiQuestion(Request $request)
    {
        $reflection_id = $request->reflection_id;
        $question_id = $request->question_id;
        $answer_id = $request->option_id;
        closed_answer::create([
            'question_id' => $question_id,
            'question_option_id' => $answer_id,
            'reflection_id'=>$reflection_id
        ]);
        $ref = reflection_progression::find($reflection_id);
        $ref->progress += 1;
        $ref->save();

        $reflection=Reflection::find($reflection_id);
        $ref_traj_id = reflection_trajectory::find($reflection->reflection_trajectory_id)->id;
    }

    public function getQuestionByIndex($type,$questionIndex)
    {
        $questions = question::where('ref_type','=',$type)->get();
        return $questions[$questionIndex];
    }

    /*Check type of reflection and get it
     *      Check if reflection already started
     *          Start if not
     *      Continue reflection if already started
     * */
    /**
     * @param $id reflection_trajectory id
     * @param $type reflection_type: past, present, future
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|void
     */
    public function indexFromReflectiontrajectory($id, $type)
    {
        switch ($type){
            case 'past':
                $ref=Reflection::where([['reflection_trajectory_id','=',$id], ['reflection_type','=','past']])->first();
                if(reflection_question::where('reflection_id','=',$ref->id)->count() == 0)
                {
                    $this->StartPastReflection($ref->id);
                }else{
                    $question = $this->getQuestionByIndex('past',$ref->reflection_progression()->first()->progress);
                    if($question->type=='multiple_choice_question')
                    {
                        $questionOptions = $question->question_options()->get();
                        return view('reflectionQuestions', ['question'=>$question, 'questionOptions'=>$questionOptions, 'ref_id' => $ref->id]);
                    }else return view('reflectionQuestions', ['question'=>$question, 'ref_id' => $ref->id]);
                }
                break;
            case 'present':
                $ref_id=Reflection::where([['reflection_trajectory_id','=',$id], ['reflection_type','=','present']])->get();
                break;
            case 'future':
                $ref_id=Reflection::where([['reflection_trajectory_id','=',$id], ['reflection_type','=','future']])->get();
                break;
        }
    }

    /**Start 'past' reflection
     * @param $id reflection id(not reflection_trajectory)
     * @return void
     */
    public function StartPastReflection($id)
    {
        reflection_question::create([
           'reflection_id' => $id,
           'question_id' => '2',
        ]);
        reflection_progression::create(['reflection_id' => $id, 'progress' => 0]);
    }

}

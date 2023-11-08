<?php

namespace App\Http\Controllers;

use App\Models\question;
use App\Models\Reflection;
use App\Models\reflection_progression;
use App\Models\reflection_question;

class ReflectionsController extends Controller
{

    public function AnswerQuestion($reflection_id)
    {
        //Check answer type
        //Store answer with correct type
        //Update ReflectionProgress
        $ref = reflection_progression::find($reflection_id);
        $ref->progress += 1;
        $ref->save();
        return $ref;
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

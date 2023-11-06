<?php

namespace App\Http\Controllers;

use App\Models\question;
use App\Models\Reflection;
use App\Models\reflection_progression;
use App\Models\reflection_question;

class ReflectionsController extends Controller
{

    public function AnswerQuestion()
    {
        //Check answer type
        //Store answer with correct type
        //Update ReflectionProgress

    }

    public function show()
    {
        return view('reflectionQuestions');
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
                $ref_id=Reflection::where([['reflection_trajectory_id','=',$id], ['reflection_type','=','past']])->id;
                if(reflection_question::where('reflection_id','=',$ref_id)->count() == 0)
                {
                    $this->StartPastReflection($ref_id);
                }else{

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
        reflection_progression::create(['reflection_id' => $id, 'progress' => 1]);
    }

}

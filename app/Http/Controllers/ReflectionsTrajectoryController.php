<?php

namespace App\Http\Controllers;
use App\Models\Reflection;
use App\Models\reflection_trajectory;
use Illuminate\Http\Request;
use function Termwind\render;

class ReflectionsTrajectoryController extends Controller
{
    public function showAll()
    {
        return view('welcome', ['ref_trajs' => reflection_trajectory::all()]);
    }

    public function store(Request $request)
    {
        $refTraj = reflection_trajectory::create(['title' => $request->title, 'user_id' => \Auth::id()]);
        return response()->json(['reflection_trajectory'=>$refTraj]);
    }

    //Method to retrieve a reflection trajectory
    public function retrieveReflectionTrajectory($id)
    {
        return reflection_trajectory::findOrFail($id);
    }
}

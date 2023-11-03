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

    public function showTrajectory($id)
    {
        return view('Reflection', ['ref'=>reflection_trajectory::where(['id' => $id])->get()]);
    }

    public function retrieveAll()
    {
        return reflection_trajectory::all();
    }

    public function store(Request $request)
    {
        reflection_trajectory::create(['title' => $request->title, 'user_id' => '1']);
        return redirect('/');
    }

    //Method to retrieve a reflection trajectory
    public function retrieveReflectionTrajectory($id)
    {

        return reflection_trajectory::where(['id' => $id])->get();
    }
}

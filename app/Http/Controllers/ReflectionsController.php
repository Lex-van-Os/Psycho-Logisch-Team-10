<?php

namespace App\Http\Controllers;
use App\Models\Reflection;
use App\Models\reflection_trajectory;
use function Termwind\render;

class ReflectionsController extends Controller
{
    public function showAll()
    {
        return view('welcome', ['ref_trajs' => reflection_trajectory::all()]);
    }
    public function index($id)
    {
        $ref = reflection_trajectory::findOrFail($id);
        return view('Reflection', ['ref_subject' => $ref.title]);
    }
}

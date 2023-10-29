<?php

namespace App\Http\Controllers;
use App\Models\Reflection;
use function Termwind\render;

class ReflectionsController extends Controller
{
    public function index($id)
    {
        Reflection::findOrFail($id);
        return render();
    }
}

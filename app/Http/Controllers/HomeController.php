<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        \Log::info('Showing user profile for user');

        $summaries = refl

        return view('home', ['summaries' => $summaries]);
    }

    /**
     * Share the summary.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function shareSummary($id)
    {
        \Log::info("Sharing summary");
        // Your code here
    }
}

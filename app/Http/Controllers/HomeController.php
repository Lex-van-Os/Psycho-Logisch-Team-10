<?php

namespace App\Http\Controllers;

use App\Models\reflection_summary;
use Illuminate\Http\Request;
use App\Models\Reflection;
use App\Models\ReflectionTrajectory;
use App\ViewModels\SummaryCardViewModel;

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
        $summaries = reflection_summary::with(['reflection.reflection_trajectory'])
            ->where('user_id', auth()->user()->id)
            ->get();

        $summaryCardViewModels = [];

        foreach ($summaries as $summary) {
            $reflection = $summary->reflection;
            $reflectionTrajectory = $reflection->reflection_trajectory;

            $summaryCardViewModel = new SummaryCardViewModel();
            $summaryCardViewModel->summaryId = $summary->id;
            $summaryCardViewModel->title = $reflectionTrajectory->title;
            $summaryCardViewModel->type = $reflection->reflection_type;
            $summaryCardViewModel->text = $summary->summary;
            $summaryCardViewModel->created_on = $summary->created_on;
            $summaryCardViewModel->isShared = $summary->shared;

            $summaryCardViewModels[] = $summaryCardViewModel;
        }

        return view('home', ['summaries' => $summaryCardViewModels]);
    }

    /**
     * Share the summary.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function shareSummary(Request $request)
    {
        try {
            \Log::info('Sharing summary');
            $summaryId = $request->input('summaryId');

            $reflectionSummary = reflection_summary::find($summaryId);

            if (!$reflectionSummary) {
                return response()->json(['message' => 'Summary not found'], 404);
            }

            $isShared = $reflectionSummary->shared;
            $reflectionSummary->shared = !$isShared;
            $reflectionSummary->save();

            return response()->json(['message' => 'Summary shared successfully', 'shared' => !$isShared]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while sharing the summary'], 500);
        }
    }
}

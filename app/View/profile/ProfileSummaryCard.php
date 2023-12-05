<?php

namespace App\View\Components\profile;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ProfileSummaryCard extends Component
{
    public $summary;

    public function __construct($summary)
    {
        $this->summary = $summary;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.profile-summary-card');
    }
}

<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public function __construct(
        public string $href = '',
        public string $title= '',
    ){}
    public function render(): View
    {
        return view('Components.card');
    }
}

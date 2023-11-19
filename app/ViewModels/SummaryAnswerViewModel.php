<?php

namespace App\ViewModels;

class SummaryAnswerViewModel
{
    public $questionTitle;
    public $answerText;

    public function __construct($questionTitle, $answerText)
    {
        $this->questionTitle = $questionTitle;
        $this->answerText = $answerText;
    }
}
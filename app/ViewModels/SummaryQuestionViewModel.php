<?php

namespace App\ViewModels;

class SummaryQuestionViewModel
{
    public $questionId;
    public $answerId;
    public $title;

    public function __construct($questionId, $answerId, $title)
    {
        $this->questionId = $questionId;
        $this->answerId = $answerId;
        $this->title = $title;
    }
}
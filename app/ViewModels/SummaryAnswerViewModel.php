<?php

namespace App\ViewModels;

class SummaryAnswerViewModel
{
    public $questionId;
    public $title;
    public $text;
    public $type;

    public function __construct($questionId, $title, $text, $type)
    {
        $this->questionId = $questionId;
        $this->title = $title;
        $this->text = $text;
        $this->type = $type;
    }
}
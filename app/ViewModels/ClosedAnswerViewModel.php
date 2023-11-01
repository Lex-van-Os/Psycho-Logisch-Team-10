<?php

namespace App\ViewModels;

class ClosedAnswerViewModel
{
    public $id;
    public $questionId;
    public $questionOptionId;
    public $text;
    public $value;


    public function __construct($id, $questionId, $questionOptionId, $text, $value)
    {
        $this->id = $id;
        $this->questionId = $questionId;
        $this->questionOptionId = $questionOptionId;
        $this->text = $text;
        $this->value = $value;
    }
}
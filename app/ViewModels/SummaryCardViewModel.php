<?php


namespace App\ViewModels;

use Illuminate\Support\Str;
use Carbon\Carbon;

class SummaryCardViewModel
{
    public $summaryId;
    public $title; // Summary reflection subject
    public $reflection; // Summary reflection type
    public $text; // Summary reflection content (text)
    public $createdDate;
    public $isShared;

    public function __construct($summaryId=null, $title=null, $reflection=null, $text=null, $createdDate=null, $isShared=null)
    {
        $this->summaryId = $summaryId;
        $this->title = $title;
        $this->reflection = $reflection;
        $this->text = $text;
        $this->createdDate = Carbon::parse($createdDate)->format('d-m-Y');
        $this->isShared = $isShared;
    }
}
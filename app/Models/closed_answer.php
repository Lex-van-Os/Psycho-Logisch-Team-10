<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fclosed_answer extends Model
{
    protected $fillable = [
        'question_id',
        'question_option_id',
    ];
}

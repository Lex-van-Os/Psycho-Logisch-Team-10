<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class open_answer extends Model
{
    protected $fillable = [
        'value',
        'question_id',
        'reflection_id',
    ];
}

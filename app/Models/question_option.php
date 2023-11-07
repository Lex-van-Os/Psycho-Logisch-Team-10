<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class question_option extends Model
{
    protected $fillable = [
        'value',
        'text',
        'question_id',
    ];
}

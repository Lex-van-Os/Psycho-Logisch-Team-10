<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class closed_answer extends Model
{
    protected $fillable = [
        'question_id',
        'question_option_id',
    ];

    public function question_option()
    {
        return $this->belongsTo(question_option::class, 'question_option_id');
    }
}

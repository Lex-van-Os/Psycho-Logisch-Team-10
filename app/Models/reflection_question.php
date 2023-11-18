<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reflection_question extends Model
{
    protected $fillable = [
        'question_id',
        'reflection_id',
    ];

    public function question_options()
    {
        return $this->hasMany(question_option::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}

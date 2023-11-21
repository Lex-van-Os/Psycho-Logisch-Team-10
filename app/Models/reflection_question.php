<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reflection_question extends Model
{
    protected $fillable = [
        'question_id',
        'reflection_id',
    ];

    public function question()
    {
        return $this->belongsTo(question::class);
    }
}

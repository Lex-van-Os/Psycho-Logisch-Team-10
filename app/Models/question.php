<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $fillable = [
        'title',
        'type',
        'ref_type',
    ];
    public function question_options()
    {
        return $this->hasMany(question_option::class);
    }
    public function question_closed_answers()
    {
        return $this->hasMany(closed_answer::class);
    }

    public function question_open_answers()
    {
        return $this->hasMany(open_answer::class);
    }
}

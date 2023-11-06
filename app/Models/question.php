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
        $this->hasMany(question_option::class);
        $this->hasMany(closed_answer::class);
        $this->hasMany(open_answer::class);
    }
}

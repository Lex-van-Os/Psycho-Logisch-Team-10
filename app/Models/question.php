<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $fillable = [
        'title',
        'type',
    ];
    public function question_options()
    {
        $this->hasMany(question_option::class);
    }
}

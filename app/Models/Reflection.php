<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reflection extends Model
{
    protected $fillable = [
        'reflection_type',
        'reflection_trajectory_id',
    ];
    public function reflection_progression()
    {
        return $this->hasOne(reflection_progression::class);
    }
}

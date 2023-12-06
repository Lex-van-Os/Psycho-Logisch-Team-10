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
    
    public function reflection_trajectory()
    {
        return $this->belongsTo(reflection_trajectory::class, 'reflection_trajectory_id', 'id');
    }

    // Add this relationship to link Reflection with reflection_summary
    public function reflection_summaries()
    {
        return $this->hasMany(reflection_summary::class);
    }
}
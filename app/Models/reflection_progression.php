<?php

namespace App\Models;

use App\Http\Controllers\ReflectionsController;
use Illuminate\Database\Eloquent\Model;

class reflection_progression extends Model
{
    protected $casts = [
        'progress' => 'integer',
    ];
    protected $fillable = [
        'reflection_id',
        'progress',
    ];
    public function Reflection()
    {
        return $this->belongsTo(Reflection::class);
    }
}

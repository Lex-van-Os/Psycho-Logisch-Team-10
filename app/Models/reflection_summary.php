<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reflection_summary extends Model
{
    protected $fillable = [
        'summary',
        'reflection_id',
        'user_id',
    ];
    use HasFactory;
}

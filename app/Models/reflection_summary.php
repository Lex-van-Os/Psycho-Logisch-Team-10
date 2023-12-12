<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class reflection_summary
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $summary
 * @property int $reflection_id
 * @property int $user_id
 * @property bool $shared
 * @property \App\Models\Reflection $reflection
 */
class reflection_summary extends Model
{
    protected $fillable = [
        'summary',
        'reflection_id',
        'user_id',
        'shared'
    ];
    
    use HasFactory;
    
    /**
     * Get the reflection that owns the reflection summary.
     */
    public function reflection()
    {
        return $this->belongsTo(Reflection::class, 'reflection_id', 'id');
    }
}

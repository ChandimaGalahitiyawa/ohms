<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WeeklyAvailability extends Model
{
    use HasFactory;

    protected $fillable = ['day','center_id', 'start_time', 'end_time', 'slots'];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    public function centre(): BelongsTo
    {
        return $this->belongsTo(Centre::class);
    }
    
}

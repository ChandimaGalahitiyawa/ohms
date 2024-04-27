<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyAvailability extends Model
{
    use HasFactory;

    protected $fillable = ['day', 'start_time', 'end_time', 'slots'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}

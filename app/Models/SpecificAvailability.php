<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecificAvailability extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'start_time', 'end_time', 'slots'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function centres()
    {
        return $this->belongsToMany(Centre::class, 'member_availability_centre');
    }
}

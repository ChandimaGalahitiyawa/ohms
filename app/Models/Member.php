<?php

namespace App\Models;

use App\Models\Centre;
use App\Models\Specialization;
use Illuminate\Support\Carbon;
use App\Models\WeeklyAvailability;
use App\Models\SpecificAvailability;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    // this will allow the following fields to be mass assigned
    protected $fillable = ['last_name', 'nic', 'user_id', 'phone', 'nationality', 'passport','dob', 'address', 'medical_school', 'license_number' ]; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // this will call the specialization model and return the specializations of the member
    public function specializations()
    {
        return $this->belongsToMany(Specialization::class, 'member_specialization')
                    ->withPivot('fee')
                    ->withTimestamps();
    }


    // this will call the centre model and return the centres of the member
    public function centres()
    {
        return $this->belongsToMany(Centre::class, 'member_availability_centre')
                    ->withPivot('weekly_availability_id', 'specific_availability_id')
                    ->withTimestamps();
    }    

    public function weeklyAvailabilities(): HasMany
    {
        return $this->hasMany(WeeklyAvailability::class);
    }

    public function specificAvailabilities()
    {
        return $this->hasMany(SpecificAvailability::class);
    }

    // Member.php model
    public function isAvailableOn(Carbon $date)
    {
        // existing logic with specific and weekly availabilities here
    }

    public function nextAvailableDateAfter(Carbon $date)
    {
        // Implement more refined logic to find the earliest next available date
    }

}
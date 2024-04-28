<?php

namespace App\Models;

use App\Models\Specialization;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
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

    // this will call the weekly availability model and return the weekly availabilities of the member
    public function weeklyAvailabilities()
    {
        return $this->hasMany(WeeklyAvailability::class);
    }

    // this will call the specific availability model and return the specific availabilities of the member
    public function specificAvailabilities()
    {
        return $this->hasMany(SpecificAvailability::class);
    }

}
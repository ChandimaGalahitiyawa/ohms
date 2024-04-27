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
    protected $fillable = ['last_name', 'nic', 'user_id', 'phone', 'nationality', 'passport','dob', 'address', 'medical-school', 'license-number' ]; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // this will call the specialization model and return the specializations of the member
    public function specializations()
    {
        return $this->belongsToMany(Specialization::class, 'member_specialization');
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
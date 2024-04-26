<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['last_name', 'nic', 'user_id', 'phone', 'nationality', 'passport','dob', 'address', 'medical-school', 'license-number' ]; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function specializations()
    {
        return $this->belongsToMany(Specialization::class, 'member_specialization');
    }
}
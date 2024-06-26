<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['last_name', 'nic', 'user_id', 'phone', 'nationality', 'passport']; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function medicalData()
    {
        return $this->hasMany(MedicalData::class);
    }
}

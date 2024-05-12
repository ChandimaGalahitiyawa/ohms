<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorNote extends Model
{
    use HasFactory;


    protected $fillable = [
        'appointment_id',
        'description',
        'file_path',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}

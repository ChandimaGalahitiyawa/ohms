<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'member_id',
        'centre_id',
        'queue_no',
        'appointment_time',
        'center_charge',
        'doctor_charge',
        'appointment_date',
        'status',
        'notes',
        'total',
        'reference_id',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function center()
    {
        return $this->belongsTo(Centre::class, 'centre_id');
    }

    public function doctorNote()
    {
        return $this->hasOne(DoctorNote::class, 'appointment_id');
    }
}


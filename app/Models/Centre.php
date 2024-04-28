<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centre extends Model
{
    use HasFactory;

    protected $fillable = [
        'centre_name',
        'centre_contact_number',
        'centre_email_address',
        'centre_city',
        'address',
        'centre_fee_type',
        'centre_accept_currency',
        'centre_fee',
        'refund_protection_fee'
    ];

    // this will call the member model and return the members of the centre
    public function members()
    {
        return $this->belongsToMany(Member::class, 'member_availability_centre')
                    ->withPivot('weekly_availability_id', 'specific_availability_id')
                    ->withTimestamps();
    }
}

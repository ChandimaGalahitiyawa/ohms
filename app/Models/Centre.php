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
        'country'
    ];
}

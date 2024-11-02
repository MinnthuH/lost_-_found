<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'brand_id',
        'name',
        'phone_color',
        'imei_number',
        'lost_date',
        'lost_time',
        'lost_location',
        'contact_number',
        'contact_email',
        'address',
        'social_url',
        'image',
        'status',
    ];
}

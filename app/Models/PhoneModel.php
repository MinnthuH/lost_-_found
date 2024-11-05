<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneModel extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'device_id',
        'brand_id',
        'model',
        'color',
        'status',
        'image',
        'description',
    ];

    // Mutator for color
    public function getColorAttribute($value)
    {
        return $value ? explode(',', $value) : [];
    }

    // Mutator to store color as a string
    public function setColorAttribute($value)
    {
        $this->attributes['color'] = is_array($value) ? implode(',', $value) : $value;
    }

    // Relationships
    // public function device()
    // {
    //     return $this->belongsTo(Device::class);
    // }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}


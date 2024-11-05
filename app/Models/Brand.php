<?php

namespace App\Models;

use App\Models\Device;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_id',
        'name',
        'model',
        'color',
        'status',
        'image',
        'description',
    ];

    public function getColorAttribute($value)
    {
        return $value ? explode(',', $value) : [];
    }

    // Mutator to convert the array to a string before saving to the database
    public function setColorAttribute($value)
    {
        $this->attributes['color'] = is_array($value) ? implode(',', $value) : $value;
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}

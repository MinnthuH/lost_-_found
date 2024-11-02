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

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}

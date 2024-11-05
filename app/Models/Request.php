<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\File;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'user_id',
        'brand_id',
        'phone_model',
        'phone_color',
        'imei_number',
        'lost_date',
        'lost_time',
        'lost_location',
        'contact_number',
        'contact_email',
        'address',
        'social_url',
        'message',
        'image',
        'status',
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($request) {
            // Check if the request has an image
            if ($request->image) {
                // Construct the full path to the image in the public/images directory
                $imagePath = public_path('images/' . $request->image);
                
                // Check if the file exists, then delete it
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
        });
    }
}

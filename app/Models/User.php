<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;  // Import Filament\Panel
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'status',
        'password',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        // Allow access if the user has the 'admin' role
        return $this->hasRole('admin');
    }
}


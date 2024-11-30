<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class MasterAdmin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'full_name',
        'email', 
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function userAdmins()
    {
        return $this->hasMany(UserAdmin::class);
    }
}

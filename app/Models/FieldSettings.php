<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldSettings extends Model
{
    protected $fillable = [
        'user_admin_id',
        'fields_settings'
    ];
}

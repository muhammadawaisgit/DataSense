<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomAdsSettings extends Model
{
    protected $table = 'custom_ads_settings';
    protected $fillable = ['user_admin_id', 'ads_settings'];
}

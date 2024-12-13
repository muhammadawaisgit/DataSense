<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = [
        'user_admin_id',
        'firstName',
        'lastName', 
        'email',
        'company',
        'phone',
        'mobile',
        'address',
        'city',
        'state', 
        'zipcode',
        'birthMonth',
        'birthDay',
        'physicalMailing',
        'digitalMailing',
        'loyaltyEnrollment'
    ];
}

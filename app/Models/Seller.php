<?php

namespace App\Models;

use App\Models\AuthBaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seller extends AuthBaseModel
{
    use HasFactory;

    protected $table = 'sellers';
    protected $guard_name = 'seller';
    protected $guard = 'seller';

    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'image',
        'status',
        'is_verify',
        'gender',
        'email_verified_at',
        'otp_send_at',
        'emergency_phone',
        'phone',
        'father_name',
        'mother_name',
        'present_address',
        'permanent_address',

        'creater_id',
        'updater_id',
        'deleter_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}


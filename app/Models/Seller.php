<?php

namespace App\Models;

use App\Models\AuthBaseModel;

class Seller extends AuthBaseModel
{

    protected $table = 'sellers';

    protected $fillable = [
        'sort_order',
        'name',
        'email',
        'password',
        'username',
        'image',
        'status',
        'is_verify',
        'gender',
        'otp_send_at',
        'emergency_phone',
        'phone',
        'father_name',
        'mother_name',

        'creater_id',
        'updater_id',
        'deleter_id',

        'creater_type',
        'updater_type',
        'deleter_type',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'status'=> 'integer',
        'is_verify'=> 'integer',
        'gender'=> 'integer',
        'creater_id' => 'integer',
        'updater_id'=> 'integer',
        'deleter_id'=> 'integer',
    ];





}


<?php

namespace App\Models;

use App\Models\AuthBaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Seller extends AuthBaseModel
{
    use HasFactory, Notifiable;
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->appends = array_merge(parent::getAppends(), [
            'modified_image',
        ]);
    }

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
        'password',
        'otp_send_at',
        'emargency_phone',
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


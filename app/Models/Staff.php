<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Notifications\Notifiable;
use App\Notifications\StaffPasswoedResetNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends AuthBaseModel
{
    use Notifiable;

     public function sendPasswordResetNotification($token)
    {
        $this->notify(new StaffPasswoedResetNotification($token));
    }
    use HasFactory;
    protected $table = 'staffs';
    protected $guard = 'staff';
    protected $fillable = [
        'hub_id',
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'phone',
        'image',
        'status',
        'is_verify',
        'otp_send_at',
        'remember_token',

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
        'status' => 'integer',
        'is_verify' => 'integer',
        'creater_id' => 'integer',
        'updater_id' => 'integer',
        'deleter_id' => 'integer',
    ];
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->appends = array_merge(parent::getAppends(), [
            'modified_image',
        ]);
    }

    public function getModifiedImageAttribute()
    {
        return storage_url($this->image);
    }
}

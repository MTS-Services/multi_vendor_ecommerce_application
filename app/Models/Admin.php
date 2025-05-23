<?php

namespace App\Models;

use App\Notifications\AdminPasswordResetNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use OwenIt\Auditing\Contracts\Auditable;

class Admin extends AuthBaseModel implements Auditable
{
    use HasFactory, HasRoles, \OwenIt\Auditing\Auditable, Notifiable;

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminPasswordResetNotification($token));
    }

    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     *
     */
    protected $guard='admin';
    protected $fillable = [
        'sort_order',
        'first_name',
        'last_name',
        'username',
        'email',
        'phone',
        'image',
        'role_id',
        'status',
        'is_verify',
        'password',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    protected $guard_name = 'admin';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'deleted_by' => 'integer',
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'status' => 'integer',
            'is_verify' => 'integer',
            'username' => 'string',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id')->select(['name', 'id']);
    }

    public function personalInformation():MorphOne
    {
        return $this->morphOne(PersonalInformation::class, 'profile');
    }

}

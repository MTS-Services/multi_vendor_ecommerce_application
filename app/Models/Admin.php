<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use OwenIt\Auditing\Contracts\Auditable;

class Admin extends AuthBaseModel implements Auditable
{
    use HasFactory, HasRoles, \OwenIt\Auditing\Auditable, Notifiable;

    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
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
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'status' => 'integer',
            'is_verify' => 'integer',
            'username' => 'string',
        ];
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->appends = array_merge(parent::getAppends(), [

            'status_label',
            'status_color',
            'status_btn_label',
            'status_btn_color',
            'status_labels',

            'modified_image',
        ]);
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id')->select(['name', 'id']);
    }
}

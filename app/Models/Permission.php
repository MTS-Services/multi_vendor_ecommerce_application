<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermission;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends SpatiePermission implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable, SoftDeletes;

    protected $fillables = [
        'sort_order',
        'frist_name', 'last_name',
        'prefix',
        'guard_name',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


  public function creater_admin()
    {
        return $this->belongsTo(Admin::class, 'created_by')->select(['id', 'first_name', 'last_name']);
    }

    public function updater_admin()
    {
        return $this->belongsTo(Admin::class, 'updated_by')->select(['id', 'first_name', 'last_name']);
    }

    public function deleter_admin()
    {
        return $this->belongsTo(Admin::class, 'deleted_by')->select(['id', 'first_name', 'last_name']);
    }

    protected $appends = [
        'creater_name',
        'updater_name',
        'deleter_name',

        'created_at_human',
        'updated_at_human',
        'deleted_at_human',

        'created_at_formatted',
        'updated_at_formatted',
        'deleted_at_formatted',
    ];

    // Accessor for creater
    public function getCreaterNameAttribute()
    {
        return $this->creater_admin?->full_name
            ?? $this->creater?->full_name
            ?? "System Generate";
    }

    // Accessor for updater
    public function getUpdaterNameAttribute()
    {
        return $this->updater_admin?->full_name
            ?? $this->updater?->full_name
            ?? "Null";
    }

    // Accessor for deleter
    public function getDeleterNameAttribute()
    {
        return $this->deleter_admin?->full_name
            ?? $this->deleter?->full_name
            ?? "Null";
    }


    // Accessor for created time
    public function getCreatedAtFormattedAttribute()
    {
        return timeFormat($this->created_at);
    }

    // Accessor for updated time
    public function getUpdatedAtFormattedAttribute()
    {
        return $this->created_at != $this->updated_at ? timeFormat($this->updated_at) : 'Null';
    }

    // Accessor for deleted time
    public function getDeletedAtFormattedAttribute()
    {
        return $this->deleted_at ? timeFormat($this->deleted_at) : 'Null';
    }

    // Accessor for created time human readable
    public function getCreatedAtHumanAttribute()
    {
        return timeFormatHuman($this->created_at);
    }

    // Accessor for updated time human readable
    public function getUpdatedAtHumanAttribute()
    {
        return $this->created_at != $this->updated_at ? timeFormatHuman($this->updated_at) : 'Null';
    }

    // Accessor for deleted time human readable
    public function getDeletedAtHumanAttribute()
    {
        return $this->deleted_at ? timeFormatHuman($this->deleted_at) : 'Null';
    }
}

<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hub extends BaseModel
{
    protected $table = 'hubs';

    protected $fillable = [
        'sort_order',
        'country_id',
        'state_id',
        'city_id',
        'operation_area_id',
        'operation_sub_area_id',
        'name',
        'slug',
        'address',
        'latitude',
        'longitude',
        'description',
        'meta_title',
        'meta_description',
        'status',

        'created_by',
        'updated_by',
        'deleted_by',
    ];
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->appends = array_merge(parent::getAppends(), [

            'status_label',
            'status_color',
            'status_btn_label',
            'status_btn_color',
            'status_labels',
        ]);
    }
    public const STATUS_ACTIVE = 1;
    public const STATUS_DEACTIVE = 0;
    // Status labels
    public static function getStatusLabels(): array
    {
        return [
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_DEACTIVE => 'Deactive',
        ];
    }



    // Status colors
    public static function getStatusColors(): array
    {
        return [
            self::STATUS_ACTIVE => 'bg-success', // Green for active
            self::STATUS_DEACTIVE => 'bg-warning', // Red for deactive
        ];
    }

    // Status btn labels
    public static function getStatusBtnLabels(): array
    {
        return [
            self::STATUS_ACTIVE => 'Deactive',
            self::STATUS_DEACTIVE => 'Active',
        ];
    }

    // Status btn colors
    public static function getStatusBtnColors(): array
    {
        return [
            self::STATUS_ACTIVE => 'btn btn-warning', // Green for active
            self::STATUS_DEACTIVE => 'btn btn-success', // Red for deactive
        ];
    }

    // Accessor for status labels
    public function getStatusLabelsAttribute(): array
    {
        return self::getStatusLabels();
    }

    // Accessor for status label
    public function getStatusLabelAttribute(): string
    {
        return self::getStatusLabels()[$this->status] ?? 'Unknown';
    }
    // Accessor for status color
    public function getStatusColorAttribute(): string
    {
        return self::getStatusColors()[$this->status] ?? 'bg-secondary';
    }

    // Accessor for status label
    public function getStatusBtnLabelAttribute(): string
    {
        return self::getStatusBtnLabels()[$this->status] ?? 'Unknown';
    }

    // Accessor for status btn color
    public function getStatusBtnColorAttribute(): string
    {
        return self::getStatusBtnColors()[$this->status] ?? 'btn btn-secondary';
    }

    public function scopeActive($query): mixed
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    public function scopeDeactive($query): mixed
    {
        return $query->where('status', self::STATUS_DEACTIVE);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id','id');

    }
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id','id');

    }
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id','id');

    }
    public function operationArea(): BelongsTo
    {
        return $this->belongsTo(OperationArea::class, 'operation_area_id','id');

    }
    public function operationSubArea(): BelongsTo
    {
        return $this->belongsTo(OperationSubArea::class, 'operation_sub_area_id','id');

    }

}

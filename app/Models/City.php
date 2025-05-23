<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class City extends BaseModel
{
    protected $fillable = [
        'sort_order',
        'state_id',
        'country_id',
        'name',
        'slug',
        'description',
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

            'country_name',
            'state_name',
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
    public function getCountryNameAttribute(): string|null
    {
        return $this->country?->name;
    }
    public function getStateNameAttribute(): string|null
    {
        return $this->state?->name;
    }
    public function operationAreas(): HasMany
    {
        return $this->hasMany(OperationArea::class,'city_id');
    }
    public function operationSubAreas(): HasMany
    {
        return $this->hasMany(OperationSubArea::class,'city_id');
    }
    public function hubs(): HasMany
    {
        return $this->hasMany(Hub::class,'city_id');
    }
    public function activeOperationAreas(): HasMany
    {
        return $this->operationAreas()->active();
    }
    public function activeOperationSubAreas(): HasMany
    {
        return $this->operationSubAreass()->active();
    }
    public function taxrate(): HasMany
    {
        return $this->hasMany(TaxRate::class, 'city_id', 'id');
    }
    public function activeHubs(): HasMany
    {
        return $this->hubs()->active();
    }
}



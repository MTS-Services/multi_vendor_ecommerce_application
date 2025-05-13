<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\AuthBaseModel;

class Seller extends AuthBaseModel
{

    protected $table = 'sellers';

    protected $fillable = [
        'sort_order',
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

        'shop_name',
        'shop_slug',
        'shop_logo',
        'shop_banner',
        'shop_description',
        'business_phone',

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
            'modified_shop_logo',
            'modified_shop_banner'
        ]);
    }

    public function getModifiedShopLogoAttribute()
    {
        return storage_url($this->shop_logo);
    }

    public function getModifiedShopBannerAttribute()
    {
        return storage_url($this->shop_banner);
    }
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class , 'country_id', 'id');
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class , 'state_id', 'id');
    }

    public function city() : BelongsTo
    {
        return $this->belongsTo(City::class , 'city_id', 'id');
    }

    public function hub(): BelongsTo
    {
        return $this->belongsTo(Hub::class , 'hub_id', 'id');
    }

    public function operationArea(): BelongsTo
    {
        return $this->belongsTo(OperationArea::class , 'operation_area_id', 'id');
    }

    public function operationSubArea(): BelongsTo
    {
        return $this->belongsTo(OperationSubArea::class , 'operation_sub_area_id', 'id');
    }
}

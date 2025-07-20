<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\AuthBaseModel;
use App\Notifications\SellerPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Notifications\Notifiable;

class Seller extends AuthBaseModel
{
    use HasFactory, Notifiable;
    protected $table = 'sellers';
    protected $guard = 'seller';

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new SellerPasswordNotification($token));
    }

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

        'country_id',
        'state_id',
        'city_id',
        'operation_area_id',
        'operation_sub_area_id',
        'hub_id',

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
    public function personalInformation():MorphOne
    {
        return $this->morphOne(PersonalInformation::class, 'profile');
    }
    public function country (): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function state (): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id');
    }
    public function city (): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function hub (): BelongsTo
    {
        return $this->belongsTo(Hub::class, 'hub_id');
    }
    public function operationArea (): BelongsTo
    {
        return $this->belongsTo(OperationArea::class, 'operation_area_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function oparationSubArea (): BelongsTo
    {
        return $this->belongsTo(OperationSubArea::class, 'operation_sub_area_id');
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}

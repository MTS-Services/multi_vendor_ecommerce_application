<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariationAttributeValue extends BaseModel
{
     protected $fillable = [
        'sort_order',
        'variation_id',
        'attribute_value_id',

        'creater_id',
        'updater_id',
        'deleter_id',

        'creater_type',
        'updater_type',
        'deleter_type',
    ];

    public function productVariation(): BelongsTo
    {
        return $this->belongsTo(ProductVariation::class,'variation_id');
    }

    public function productAttributeValue(): BelongsTo
    {
        return $this->belongsTo(ProductAttributeValue::class,'attribute_value_id');
    }

}

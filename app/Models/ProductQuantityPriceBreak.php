<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductQuantityPriceBreak extends BaseModel
{
    protected $fillable = [
            'sort_order',
            'product_id',
            'min_quantity',
            'price',

            'creater_id',
            'updater_id',
            'deleter_id',

            'creater_type',
            'updater_type',
            'deleter_type',
        ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}

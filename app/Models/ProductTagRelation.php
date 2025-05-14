<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductTagRelation extends BaseModel
{
      protected $fillable = [
        'sort_order',
        'product_id',
        'tag_id',

        'creater_id',
        'updater_id',
        'deleter_id',

        'creater_type',
        'updater_type',
        'deleter_type',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function tag(): BelongsTo
    {
        return $this->belongsTo(ProductTag::class,'tag_id');
    }
}

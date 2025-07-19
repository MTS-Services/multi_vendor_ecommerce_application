<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends BaseModel
{
    use HasFactory;


    protected $fillable = [
        'sort_order',
        'seller_id',
        'brand_id',
        'category_id',
        'tax_class_id',
        'name',
        'slug',
        'sku',
        'status',
        'is_featured',
        'is_published',
        'description',
        'short_description',
        'meta_title',
        'meta_description',
        'meta_keywords',

        'creater_id',
        'updater_id',
        'deleter_id',
    ];

    // relation
    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function taxClass()
    {
        return $this->belongsTo(TaxClass::class, 'tax_class_id');
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

            'featured_label',
            'featured_color',
            'featured_btn_label',
            'featured_btn_color',
            'featured_labels',

            'published_label',
            'published_color',
            'published_btn_label',
            'published_btn_color',
            'published_labels',
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


    // ========================================Featured labels

    public const FEATURED = 1;
    public const NOT_FEATURED = 0;
    // Featured labels
    public static function getFeaturedLabels(): array
    {
        return [
            self::FEATURED => 'Featured',
            self::NOT_FEATURED => 'Not Featured',
        ];
    }



    // Featured colors
    public static function getFeaturedColors(): array
    {
        return [
            self::FEATURED => 'bg-success',
            self::NOT_FEATURED => 'bg-warning',
        ];
    }

    // Featured btn labels
    public static function getFeaturedBtnLabels(): array
    {
        return [
            self::FEATURED => 'Remove From Featured',
            self::NOT_FEATURED => 'Make Featured',
        ];
    }

    // Featured btn colors
    public static function getFeaturedBtnColors(): array
    {
        return [
            self::FEATURED => 'btn btn-warning',
            self::NOT_FEATURED => 'btn btn-success',
        ];
    }

    // Accessor for Featured labels
    public function getFeaturedLabelsAttribute(): array
    {
        return self::getFeaturedLabels();
    }

    // Accessor for Featured label
    public function getFeaturedLabelAttribute(): string
    {
        return self::getFeaturedLabels()[$this->is_featured] ?? 'Unknown';
    }
    // Accessor for Featured color
    public function getFeaturedColorAttribute(): string
    {
        return self::getFeaturedColors()[$this->is_featured] ?? 'bg-secondary';
    }

    // Accessor for Featured label
    public function getFeaturedBtnLabelAttribute(): string
    {
        return self::getFeaturedBtnLabels()[$this->is_featured] ?? 'Unknown';
    }

    // Accessor for Featured btn color
    public function getFeaturedBtnColorAttribute(): string
    {
        return self::getFeaturedBtnColors()[$this->is_featured] ?? 'btn btn-secondary';
    }

    public function scopeFeatured($query): mixed
    {
        return $query->where('is_featured', self::FEATURED);
    }

    public function scopeNotFeatured($query): mixed
    {
        return $query->where('is_featured', self::NOT_FEATURED);
    }

    // ========================================Published labels

    public const PUBLISHED = 1;
    public const NOT_PUBLISHED = 0;
    // Published labels
    public static function getPublishedLabels(): array
    {
        return [
            self::PUBLISHED => 'Published',
            self::NOT_PUBLISHED => 'Not Published',
        ];
    }



    // Published colors
    public static function getPublishedColors(): array
    {
        return [
            self::PUBLISHED => 'bg-success',
            self::NOT_PUBLISHED => 'bg-warning',
        ];
    }

    // Published btn labels
    public static function getPublishedBtnLabels(): array
    {
        return [
            self::PUBLISHED => 'Remove From Published',
            self::NOT_PUBLISHED => 'Make Published',
        ];
    }

    // Published btn colors
    public static function getPublishedBtnColors(): array
    {
        return [
            self::PUBLISHED => 'btn btn-warning',
            self::NOT_PUBLISHED => 'btn btn-success',
        ];
    }

    // Accessor for Published labels
    public function getPublishedLabelsAttribute(): array
    {
        return self::getPublishedLabels();
    }

    // Accessor for Published label
    public function getPublishedLabelAttribute(): string
    {
        return self::getPublishedLabels()[$this->is_published] ?? 'Unknown';
    }
    // Accessor for Published color
    public function getPublishedColorAttribute(): string
    {
        return self::getPublishedColors()[$this->is_published] ?? 'bg-secondary';
    }

    // Accessor for Published label
    public function getPublishedBtnLabelAttribute(): string
    {
        return self::getPublishedBtnLabels()[$this->is_published] ?? 'Unknown';
    }

    // Accessor for Published btn color
    public function getPublishedBtnColorAttribute(): string
    {
        return self::getPublishedBtnColors()[$this->is_published] ?? 'btn btn-secondary';
    }

    public function scopePublished($query): mixed
    {
        return $query->where('is_published', self::PUBLISHED);
    }

    public function scopeNotPublished($query): mixed
    {
        return $query->where('is_published', self::NOT_PUBLISHED);
    }


}

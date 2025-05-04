<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends BaseModel
{
    use HasFactory;

    public const STATUS_ACTIVE = 1;
    public const STATUS_DEACTIVE = 0;

    public const FEATURED = 1;
    public const NOT_FEATURED = 2;

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






    public static function getFeaturedLabels(): array
    {
        return [
            self::FEATURED => 'Yes',
            self::NOT_FEATURED => 'No',
        ];
    }

    // Feature colors
    public static function getFeaturedColors(): array
    {
        return [
            self::FEATURED => 'bg-info',
            self::NOT_FEATURED => 'bg-warning',
        ];
    }

    // Feature btn labels
    public static function getFeaturedBtnLabels(): array
    {
        return [
            self::FEATURED => 'Remove From Featured',
            self::NOT_FEATURED => 'Make Featured',
        ];
    }

    // Feature btn colors
    public static function getFeaturedBtnColors(): array
    {
        return [
            self::FEATURED => 'btn btn-warning',
            self::NOT_FEATURED => 'btn btn-info',
        ];
    }

    // Accessor for Feature labels
    public function getFeaturedLabelsAttribute(): array
    {
        return self::getFeaturedLabels();
    }

    // Accessor for Feature label
    public function getFeaturedLabelAttribute(): string
    {
        return self::getFeaturedLabels()[$this->is_featured] ?? 'Unknown';
    }
    // Accessor for Feature color
    public function getFeaturedColorAttribute(): string
    {
        return self::getFeaturedColors()[$this->is_featured] ?? 'bg-secondary';
    }

    // Accessor for Feature label
    public function getFeaturedBtnLabelAttribute(): string
    {
        return self::getFeaturedBtnLabels()[$this->is_featured] ?? 'Unknown';
    }

    // Accessor for Featured btn color
    public function getFeaturedBtnColorAttribute(): string
    {
        return self::getFeaturedBtnColors()[$this->is_featured] ?? 'btn btn-secondary';
    }
}

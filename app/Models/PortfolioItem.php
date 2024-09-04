<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioItem extends Model
{
    use HasFactory;

    protected $fillable = ['category', 'image_public_id'];

    public const CATEGORIES = [
        'evenimente' => 'Evenimente',
        'natura' => 'Natura',
        'nunti_botezuri' => 'Nunți & Botezuri',
    ];

    /**
     * Get the category label.
     *
     * @return string
     */
    public function getCategoryLabelAttribute()
    {
        return self::CATEGORIES[$this->category] ?? $this->category;
    }

    /**
     * Scope a query to only include items of a given category.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $category
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
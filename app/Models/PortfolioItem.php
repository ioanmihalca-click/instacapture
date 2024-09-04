<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PortfolioItem extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'image_public_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategoryLabelAttribute()
    {
        return $this->category->name;
    }

    public function scopeOfCategory($query, $category)
    {
        return $query->whereHas('category', function ($query) use ($category) {
            $query->where('slug', $category);
        });
    }
}
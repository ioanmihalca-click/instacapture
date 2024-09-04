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
}
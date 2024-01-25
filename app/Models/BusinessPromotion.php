<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessPromotion extends Model
{
    use HasFactory;
    protected $table = "business_promotions";
    protected $fillable = [
        'title',
        'description',
        'image',
        'slug',
        'videourl',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status',

    ];
}

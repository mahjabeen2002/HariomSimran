<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = "articles";
    protected $fillable = [
        'title',
       'category_id',
        'description',
        'image',

        'date',
        'user_id',
        'slug',
        'videourl',
        
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status',

    ];
}

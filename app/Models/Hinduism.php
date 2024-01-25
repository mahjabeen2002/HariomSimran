<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hinduism extends Model
{
    use HasFactory;
    protected $table = "hinduisms";
    protected $fillable = [
        'title',
       'category_id',
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

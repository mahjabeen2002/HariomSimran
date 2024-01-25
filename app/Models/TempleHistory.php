<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempleHistory extends Model
{
    use HasFactory;
    protected $table = "temple_histories";
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

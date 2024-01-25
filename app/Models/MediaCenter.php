<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaCenter extends Model
{
    protected $table = "media_centers";
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'videourl',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status',

    ];
}

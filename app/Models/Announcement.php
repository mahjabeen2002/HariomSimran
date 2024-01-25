<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $table = "announcements";
    protected $fillable = [
        'title',
       'category_id',
        'description',
        'image',

        'date',
        'slug',
        'videourl',
        'meta_title',
        
        'meta_keyword',
        'meta_description',
        'status',

    ];
}

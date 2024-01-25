<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;
    protected $table = "libraries";
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'description',

        'image',
        'pdf',
        'meta_title',
        'meta_keyword',

        'meta_description',
        'status',

    ];
}

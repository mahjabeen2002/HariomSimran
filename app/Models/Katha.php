<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katha extends Model
{
    use HasFactory;
    protected $table = "kathas";
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'description',

        'image',
        'meta_title',
        'meta_keyword',
        'meta_description',
        
        'status',

    ];
}

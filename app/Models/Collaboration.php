<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaboration extends Model
{
    use HasFactory;
    protected $table = "collaborations";
    protected $fillable = [
        'title',
       'category_id',
        'description',
        'image',

        'date',
        'slug',
        'meta_title',
        'meta_keyword',
        
        'meta_description',
        'status',

    ];
}

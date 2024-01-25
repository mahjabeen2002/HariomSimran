<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = "teams";
    protected $fillable = [
        'title',
       'designation',
        'description',
        'image',
        'slug',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status',

    ];
}

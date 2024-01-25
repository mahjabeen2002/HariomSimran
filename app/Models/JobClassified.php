<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobClassified extends Model
{
    use HasFactory;
    protected $table = "job_classifieds";
    protected $fillable = [
        'title',
        'slug',
        'countryid',
        'description',
        'image',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status',

    ];
}

<?php

namespace App\Models;

use App\Models\CourseDetails;
use App\Models\CourseSubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instructor extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'phone',
        'skills',
        'bio',
        'profile_picture'
    ];

    public function courses()
    {
        return $this->hasMany(CourseSubCategory::class);
    }

}

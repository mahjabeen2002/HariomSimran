<?php

namespace App\Models;

use App\Models\User;
use App\Models\CourseSubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'course_subcategory_id',
        'comment',
        'rating',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courseSubcategory()
    {
        return $this->belongsTo(CourseSubCategory::class);
    }
}

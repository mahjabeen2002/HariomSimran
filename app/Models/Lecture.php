<?php

namespace App\Models;

use App\Models\Coursequiz;
use App\Models\CourseDetails;
use App\Models\CourseSubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lecture extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';  
    protected $fillable = ['course_subcategory_id', 'title', 'description', 'video_link'];

    public function quizzes()
    {
        return $this->hasMany(Coursequiz::class);
    }


  // Lecture.php
  public function courseSubCategory()
  {
      return $this->belongsTo(CourseSubCategory::class, 'course_subcategory_id');
  }

   
}

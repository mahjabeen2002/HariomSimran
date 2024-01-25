<?php

namespace App\Models;

use App\Models\Lecture;
use App\Models\Instructor;
use App\Models\CourseCategory;
use App\Models\CourseSubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseDetails extends Model
{
    use HasFactory;


    protected $fillable = ['category_id', 'subcategory_id', 'course_description', 'what_you_will_learn', 'certification_description',  'image', 'coupon_id', 'status','instructor_id','language','review_id'];


    public function category()
    {
        return $this->belongsTo(CourseCategory::class);
    }
  public function subcategory()
{
    return $this->belongsTo(CourseSubCategory::class, 'subcategory_id');
}


    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }


    public function lectures()
{
    return $this->hasMany(Lecture::class, 'course_subcategory_id', 'subcategory_id');
}
    
   
  
}

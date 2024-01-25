<?php

namespace App\Models;

use App\Models\Lecture;
use App\Models\Material;
use App\Models\CourseReview;
use App\Models\CourseDetails;
use App\Models\CourseCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseSubCategory extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';


    protected $fillable = ['category_id', 'title', 'slug', 'course_duration', 'original_price', 'selling_price', 'description', 'image', 'level', 'status'];

    public function category()
    {
        return $this->belongsTo(CourseCategory::class);
    }

    public function details()
    {
        return $this->hasOne(CourseDetails::class);
    }


    public function lectures()
    {
        return $this->hasMany(Lecture::class, 'course_subcategory_id');
    }
    
    public function materials()
    {
        return $this->hasMany(Material::class,'course_subcategory_id');
    }


    public function reviews()
    {
        return $this->hasMany(CourseReview::class,'course_subcategory_id');
    }
}

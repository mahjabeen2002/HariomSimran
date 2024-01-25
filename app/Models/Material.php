<?php

namespace App\Models;

use App\Models\CourseSubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Material extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['course_subcategory_id', 'title', 'description', 'file'];


    public function courseSubCategory()
    {
        return $this->belongsTo(CourseSubCategory::class, 'course_sub_category_id');
    }
    
}

<?php

namespace App\Models;

use App\Models\CourseSubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'short_description', 'image'];

    public function subcategories()
    {
        return $this->hasMany(CourseSubCategory::class);
    }
}

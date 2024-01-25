<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name','department_id','slug'];


    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function tests()
    {
        return $this->hasMany(Test::class);
    }
}

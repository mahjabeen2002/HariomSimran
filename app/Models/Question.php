<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Test;
use App\Models\Option;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['test_id', 'department_id','question','marks'];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function department()
{
    return $this->belongsTo(Department::class);
}

}

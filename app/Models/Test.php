<?php

namespace App\Models;

use App\Models\Subject;
use App\Models\Department;
use App\Models\AttemptsTest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Test extends Model
{
    use HasFactory;

    protected $fillable = ['subject_id', 'user_id', 'department_id', 'title', 'description', 'level',
     'time_dur', 'pass_marks', 'total_marks', 'total_mcq'];

     public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
{
    return $this->belongsTo(Department::class);
}



public function attempts()
{
    return $this->hasMany(AttemptsTest::class);
}

}

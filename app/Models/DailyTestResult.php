<?php

namespace App\Models;

use App\Models\User;
use App\Models\DailyQuestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DailyTestResult extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'question_id', 'marks_obtained', 'total_marks', 'remarks'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dailyquiz()
    {
        return $this->belongsTo(DailyQuestion::class, 'question_id');
    }

    
    
}

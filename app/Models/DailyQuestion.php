<?php

namespace App\Models;

use App\Models\DailyOption;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DailyQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['question_name', 'marks', 'time_duration', 'correct_option'];

    public function dailyOptions()
    {
        return $this->hasMany(DailyOption::class, 'question_id');
    }

    public function correctOption()
    {
        return $this->hasOne(DailyOption::class, 'question_id', 'id');
    }
    
}

<?php

namespace App\Models;

use App\Models\DailyQuestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DailyOption extends Model
{
    use HasFactory;


    protected $fillable = ['optionA', 'optionB', 'optionC', 'optionD', 'correct_opt'];

    public function dailyQuestion()
    {
        return $this->belongsTo(DailyQuestion::class, 'question_id');
    }
}

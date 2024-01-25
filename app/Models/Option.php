<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['question_id', 'optionA', 'optionB', 'optionC', 'optionD', 'correct_opt'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}

<?php

namespace App\Models;

use App\Models\Option;
use App\Models\Question;
use App\Models\AttemptsTest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student_answers extends Model
{
    use HasFactory;

    public function attemptTest()
    {
        return $this->belongsTo(AttemptsTest::class);
    }
//     public function attempt()
// {
//     return $this->belongsTo(AttemptsTest::class);
// }

public function question()
{
    return $this->belongsTo(Question::class);
}

public function option()
{
    return $this->belongsTo(Option::class);
}

}

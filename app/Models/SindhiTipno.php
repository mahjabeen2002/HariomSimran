<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SindhiTipno extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','slug', 'description','image', 'start', 'end','status'
    ];
}

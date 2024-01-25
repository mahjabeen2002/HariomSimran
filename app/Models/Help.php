<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    use HasFactory;
    protected $table = "helps";
    protected $fillable = [
        'help',
       'name',
        'so_wo',
        'profession',
        'contact',
        'email',
        'country',
        'city',
        'address',
        'description',

    ];
}

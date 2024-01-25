<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;
    protected $table = "memberships";
    protected $fillable = [
        'first_name',
       'last_name',
        'email',
        'country',
        'city',
        'address',
        'gender',
        'age',
        'religion',

    ];
}

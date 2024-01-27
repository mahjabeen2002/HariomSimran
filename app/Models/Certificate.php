<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'institute_name',
        'heading',
        'collaboration_banner',
        'description',
        'issue_date',
        'verification_code',
    ];

}

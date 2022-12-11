<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_image',
        'name',
        'dob',
        'gender',
        'date_in',
        'old',
        'address',
        'role',
        'status',
        'phone',
        'note',
    ];
}

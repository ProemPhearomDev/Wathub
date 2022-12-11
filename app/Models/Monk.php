<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monk extends Model
{
    use HasFactory;

    protected $fillable = [
        'monk_image',
        'name',
        'dob',
        'date_in',
        'date_out',
        'old',
        'address',
        'role',
        'status',
        'phone',
        'note',
    ];
}

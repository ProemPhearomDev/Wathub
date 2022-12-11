<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comission extends Model
{
    use HasFactory;
    protected $fillable = [
        'comission_image',
        'name',
        'dob',
        'gender',
        'date_becam_comis',
        'address',
        'role',
        'status',
        'phone',
        'note',
    ];
}

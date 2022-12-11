<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'gender',
        'date_income',
        'address',
        'amount_usd',
        'amount_riels',
        // 'phone',
        'note',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = [
        'expense_name',
        'date_expense',
        'amounts_kh',
        'amounts_usd',
        'note',
    ];
}

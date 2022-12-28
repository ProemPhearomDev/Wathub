<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    use HasFactory;

    protected $fillable = [
        'bun_name',
        'person_name',
        'date',
        'village_id',
        'monk_name',
        'address',
        'note',
    ];
    public function rvillage(){
        return $this->belongsTo(Village::class,'village_id');
    }
    // public function rmonk(){
    //     return $this->belongsTo(Monk::class,'monk_id');
    // }
}

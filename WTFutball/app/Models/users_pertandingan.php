<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_pertandingan extends Model
{
    use HasFactory;

    protected $table = 'users_pertandingan';
    protected $fillable = ([
        'awayId',
        'homeId',
    ]);
}

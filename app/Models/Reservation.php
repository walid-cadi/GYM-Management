<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $fillable = [
        "name",
        "start",
        "end",
        "user_id",
    ];
}

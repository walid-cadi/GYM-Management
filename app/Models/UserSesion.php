<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSesion extends Model
{
    //
    protected $fillable = [
        "user_id",
        "sesion_id"
    ];
}

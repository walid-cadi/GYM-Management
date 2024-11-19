<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    //
    protected $fillable = [
        "name",
        "description",
        "spots",
        "start",
        "end",
        "available",
        "is_premium",
        "user_id",
    ];

    public function trainers(){
        $this->belongsTo(User::class,"user_id");
    }
}

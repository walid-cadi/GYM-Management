<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    //
    protected $fillable = [
        "image",
        "name",
        "calories_burned",
        "sesion_id"
    ];

    public function sesion(){
        return $this->belongsTo(Sesion::class);
    }
}

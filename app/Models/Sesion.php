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

    public function trainer(){
        return $this->belongsTo(User::class,"user_id");
    }

    public function users()
{
    return $this->belongsToMany(User::class, 'user_sesions', 'sesion_id', 'user_id')
                ->withTimestamps();
}
    public function exercises(){
        return $this->hasMany(Exercise::class);
    }

}

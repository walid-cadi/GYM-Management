<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'age',
        'weight',
        'height',
        'gender',
        'calories',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function roles(){
        return $this->belongsToMany(Role::class,"user_has_roles");
    }
    public function hasRole($roles){
        return $this->roles()->wherein("name",$roles)->exists();
    }
    // public function trainerRequest(){
    //     $this->belongsTo(TrainerRequest::class);
    // }
    public function Sesions(){
        return $this->hasMany(Sesion::class ,"user_id");
    }

    public function Sessions(){
        return $this->belongsToMany(Sesion::class,"user_sesions","user_id","sesion_id");
    }

}

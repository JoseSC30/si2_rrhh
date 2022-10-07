<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
//
     static $rules = [
		'rol_id' => 'required',
		'empleado_id' => 'required',
		'email' => 'required',
		'password' => 'required',
    ];

    protected $perPage = 20;
//
    
    protected $fillable = [
        'rol_id',
        'empleado_id',
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rols()
    {
        return $this->hasOne('App\Models\Rol','id','rol_id');
    }

    public function empleados()
    {
        return $this->hasOne('App\Models\Empleado','id','empleado_id');
    }
}

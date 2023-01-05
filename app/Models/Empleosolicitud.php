<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleosolicitud
 *
 * @property $id
 * @property $puestolaboral_id
 * @property $nombre
 * @property $email
 * @property $link_cv
 * @property $valoracion
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empleosolicitud extends Model
{
    
    static $rules = [
		'puestolaboral_id' => 'required',
		'nombre' => 'required',
		'email' => 'required',
		'link_cv' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['puestolaboral_id','nombre','email','link_cv','valoracion'];

    public function puestolaboral()
    {
        return $this->hasOne('App\Models\Puestolaboral', 'id', 'puestolaboral_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Recursoasignado
 *
 * @property $id
 * @property $recurso_id
 * @property $puestolaboral_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Puestolaboral $puestolaboral
 * @property Recurso $recurso
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Recursoasignado extends Model
{
    
    static $rules = [
		'recurso_id' => 'required',
		'puestolaboral_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['recurso_id','puestolaboral_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function puestolaboral()
    {
        return $this->hasOne('App\Models\Puestolaboral', 'id', 'puestolaboral_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function recurso()
    {
        return $this->hasOne('App\Models\Recurso', 'id', 'recurso_id');
    }
    

}

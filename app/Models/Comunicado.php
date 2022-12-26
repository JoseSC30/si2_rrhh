<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comunicado
 *
 * @property $id
 * @property $usuario_id
 * @property $titulo
 * @property $detalle
 * @property $fecha
 * @property $hora
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Comunicado extends Model
{
    
    static $rules = [
		'usuario_id' => 'required',
		'titulo' => 'required',
		'detalle' => 'required',
		'fecha' => 'required',
		'hora' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['usuario_id','titulo','detalle','fecha','hora'];

    public function usuario()
    {
        return $this->hasOne('App\Models\User', 'id', 'usuario_id');
    }

}

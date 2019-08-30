<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Espacio extends Model
{
    use SoftDeletes;

    protected $table    = 'espacios';

    protected $dates = ['deleted_at'];

	  protected $fillable = [
        'ubicacion_id','description','floor','number','precio','id_tarifa'
    ];
    /**
     * The users that belong to the role.
     */
    public function Ubicacion()
    {
        return $this->belongsTo('App\Ubicacion');
    }
    public function Articulo()
    {
        return $this->hasMany('App\Articulo');
    }
    public function Coordenadas()
    {
        return $this->belongsToMany('App\Coordenadas');
    }

}

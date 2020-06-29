<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articulo extends Model
{
    use SoftDeletes;

    protected $table    = 'articulo';

    protected $dates = ['deleted_at'];

	  protected $fillable = [
        'ubicacion_id','numero_serie','name','description','precio','count'
    ];
    
    public function Ubicacion()
    {
        return $this->belongsTo('App\Ubicacion');
    }
    public function Espacio()
    {
        return $this->belongsTo('App\Espacio');
    }
    public function AlquilerItems()
    {
        return $this->hasMany('App\AlquilerItems');
    }
}

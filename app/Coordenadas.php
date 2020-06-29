<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coordenadas extends Model
{
    use SoftDeletes;

    protected $table = 'coordinates';

    protected $dates = ['deleted_at'];

	  protected $fillable = [
        'CoorX','CoorY','espacio_id'
    ];
    
    public function Espacio()
    {
        return $this->belongsToMany('App\Espacio');
    }
    
}

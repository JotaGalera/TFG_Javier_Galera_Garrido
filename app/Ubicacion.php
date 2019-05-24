<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ubicacion extends Model
{

    use SoftDeletes;

    protected $table    = 'ubicacion';

    protected $dates = ['deleted_at'];

    public function Agrupacion()
    {
        return $this->belongsToMany('App\Agrupacion');
    }
    public function Espacio()
    {
        return $this->hasMany('App\Espacio');
    }
    public function User()
    {
        return $this->belongsToMany('App\User');
    }
    public function Articulo()
    {
        return $this->hasMany('App\Articulo');
    }

	  protected $fillable = [
        'name','address','number','codigo_postal'
    ];
    /**
     * The users that belong to the role.
     */

}

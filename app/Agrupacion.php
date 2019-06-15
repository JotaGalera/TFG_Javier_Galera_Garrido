<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agrupacion extends Model
{
    protected $table    = 'agrupacion';
    /**
     * The users that belong to the role.
     */
    public function Ubicacion()
    {
        return $this->belongsToMany('App\Ubicacion');
    }

}

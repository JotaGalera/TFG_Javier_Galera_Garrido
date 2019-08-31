<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Alquiler extends Model
{
    use SoftDeletes;

    protected $table    = 'alquiler';

    protected $dates = ['deleted_at'];

	  protected $fillable = [
        'fecha_alquiler','user_id','espacio_id','pagado'
    ];
    /**
     * The users that belong to the role.
     */
    public function User()
    {
        return $this->belongsTo('App\Ubicacion');
    }
    public function Espacio()
    {
        return $this->belongsTo('App\Espacio');
    }
}

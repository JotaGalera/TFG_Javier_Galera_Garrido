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
        'fecha_alquiler','user_id','ubicacion_id','espacio_id','pagado','notes'
    ];
    
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Espacio()
    {
        return $this->belongsTo('App\Espacio');
    }
    public function Ubicacion()
    {
        return $this->belongsTo('App\Ubicacion');
    }
    public function AlquilerItems()
    {
        return $this->hasMany('App\AlquilerItems');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlquilerItems extends Model
{
    use SoftDeletes;

    protected $table    = 'alquiler_items';

    protected $dates = ['deleted_at'];

	  protected $fillable = [
        'articulo_id','alquiler_id'
    ];
   
    public function Articulo()
    {
        return $this->belongsToMany('App\Articulo');
    }
    public function Alquiler()
    {
        return $this->belongsToMany('App\Alquiler');
    }
}

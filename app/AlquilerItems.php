<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlquilerItems extends Model
{
    use SoftDeletes;

    protected $table    = 'alquiler_item';

    protected $dates = ['deleted_at'];

	  protected $fillable = [
        'articulo_id','alquiler_id'
    ];
    /**
     * The users that belong to the role.
     */
    public function Articulo()
    {
        return $this->belongsTo('App\Articulo');
    }
    public function Alquiler()
    {
        return $this->belongsTo('App\Alquiler');
    }
}

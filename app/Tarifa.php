<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarifa extends Model
{
    use SoftDeletes;

    protected $table = 'tarifa';

    protected $dates = ['deleted_at'];

	  protected $fillable = [
        'name','description','descuento'
    ];
    
    public function User()
    {
        return $this->belongsToMany('App\User');
    }
}

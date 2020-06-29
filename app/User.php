<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens;
    use Notifiable;
    use ShinobiTrait;
    use SoftDeletes;

    protected $table    = 'users';

    protected $dates = ['deleted_at'];

    public function roles()
    {
        return $this->belongsToMany('\Caffeinated\Shinobi\Models\Role')->withTimestamps();
    }
    public function Ubicacion(){
        return $this->belongsToMany('App\Ubicacion');
    }
    public function Tarifa(){
        return $this->belongsTo('App\Tarifa');
    }
    
    protected $fillable = [
        'name', 'user', 'email', 'password', 'rfid_tag', 'pin', 'externo','id_tarifa'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

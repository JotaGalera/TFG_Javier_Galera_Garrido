<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $table    = 'permission_role';
    /**
     * The users that belong to the role.
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Permission')->withTimestamps();
    }
    public function role()
    {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }
}

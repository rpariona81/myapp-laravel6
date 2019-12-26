<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 't_roles';
    //
    public function users(){
        return $this
            ->belongsToMany('App\Models\User')
            ->withTimestamps();
    }
}

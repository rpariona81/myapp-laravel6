<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 't_roles';
    protected $dateFormat = 'Ymd h:i:s';

    //
    public function users(){
        return $this
            ->belongsToMany('App\Models\User')
            ->withTimestamps();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeopleModel extends Model
{
    protected $table = 't_people';
    //
    protected $appends = ['age'];
    protected $fillable = [
        'name', 'detail','birthdate'
    ];

    public function getAgeAttribute(){
        return date_diff(date_create($this->birthdate), date_create('now'))->y;
    }
}

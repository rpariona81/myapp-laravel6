<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 't_people';
    //
    protected $appends = ['age'];
    protected $fillable = [
        'firstname', 'lastname','birthdate'
    ];

    protected $dateFormat = 'Ymd h:i:s';

    public function getAgeAttribute(){
        return date_diff(date_create($this->birthdate), date_create('now'))->y;
    }

}

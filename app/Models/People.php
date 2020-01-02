<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 't_people';
    //
    protected $appends = ['age'];
    protected $fillable = [
        'firstname', 'lastname','birthdate'
    ];

    //protected $dateFormat = 'Ymd h:i:s';

    public function getAgeAttribute(){
        return date_diff(date_create($this->birthdate), date_create('now'))->y;
    }

    public function setCreatedAtAttribute( $value ) {
        if (config('database.default') == 'mysql') {
            $this->attributes['created_at'] = (new Carbon($value))->format('Y-m-d h:i:s');
        }elseif(config('database.default') == 'sqlsrv'){
            $this->attributes['created_at'] = (new Carbon($value))->format('Ymd h:i:s');
        }else{
            $this->attributes['created_at'] = (new Carbon($value))->format('Y-m-d h:i:s');
        }
    }

    public function setUpdatedAtAttribute( $value ) {
        if (config('database.default') == 'mysql') {
            $this->attributes['updated_at'] = (new Carbon($value))->format('Y-m-d h:i:s');
        }elseif(config('database.default') == 'sqlsrv'){
            $this->attributes['updated_at'] = (new Carbon($value))->format('Ymd h:i:s');
        }else{
            $this->attributes['updated_at'] = (new Carbon($value))->format('Y-m-d h:i:s');
        }
    }

}

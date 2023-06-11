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
        'firstname', 'lastname','birthdate','created_by','updated_by'/*,'created_at','updated_at'*/
    ];

    //protected $dateFormat = 'Ymd H:i:s';

    public function getAgeAttribute(){
        return date_diff(date_create($this->birthdate), date_create('now'))->y;
    }

    public function getCreatedAtAttribute($timestamp) {
        //return Carbon\Carbon::parse($timestamp)->format('Y-m-d H:i:s');
        return Carbon::parse($timestamp)->format('Y-m-d H:i:s');
    }
    
    public function getUpdatedAtAttribute($timestamp) {
        //return Carbon\Carbon::parse($timestamp)->format('Y-m-d H:i:s');
        return Carbon::parse($timestamp)->format('Y-m-d H:i:s');
    }
    
    /*
    public function getCreatedAtAttribute() {
        //return Carbon\Carbon::parse($this->created_at)->format('Y-m-d H:i:s');
        //return Carbon\Carbon::createFromFormat('Ymd H:i:s', $this->created_at)->toDateTimeString();
        if (config('database.default') == 'mysql') {
            return Carbon\Carbon::parse($timestamp)->format('Y-m-d H:i:s');
        }elseif(config('database.default') == 'sqlsrv'){
            return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->toDateTimeString();
            //return Carbon::createFromFormat('Ymd H:i:s', $timestamp)->toDateTimeString();
            //return Carbon::parse($timestamp)->format('Y-m-d H:i:s');
            //return Carbon::parse($timestamp)->format('Y-m-d H:i:s');
        }else{
            return Carbon\Carbon::parse($timestamp)->format('Y-m-d H:i:s');
        }
        //https://stackoverflow.com/questions/37957595/carbon-php-the-separation-symbol-could-not-be-found-data-missing
        //return Carbon\Carbon::parse($timestamp)->format('M d, Y');
    }

    public function getUpdatedAtAttribute() {
        //return Carbon\Carbon::parse($this->updated_at)->format('Y-m-d H:i:s');
        //return Carbon\Carbon::createFromFormat('Ymd H:i:s', $this->updated_at)->toDateTimeString();
        if (config('database.default') == 'mysql') {
            return Carbon\Carbon::parse($timestamp)->format('Y-m-d H:i:s');
        }elseif(config('database.default') == 'sqlsrv'){
            //return Carbon\Carbon::createFromFormat('Ymd H:i:s', $timestamp)->toDateTimeString();
            return Carbon\Carbon::parse($timestamp)->format('Y-m-d H:i:s');
        }else{
            return Carbon\Carbon::parse($timestamp)->format('Y-m-d H:i:s');
        }
        //https://stackoverflow.com/questions/37957595/carbon-php-the-separation-symbol-could-not-be-found-data-missing
        //return Carbon\Carbon::parse($timestamp)->format('M d, Y');
    }
    */

    public function setCreatedAtAttribute($value) {
        if (config('database.default') == 'mysql') {
            $this->attributes['created_at'] = (new Carbon($value))->format('Y-m-d H:i:s');
        }elseif(config('database.default') == 'sqlsrv'){
            $this->attributes['created_at'] = (new Carbon($value))->format('Ymd H:i:s');
        }else{
            $this->attributes['created_at'] = (new Carbon($value))->format('Y-m-d H:i:s');
        }
    }

    public function setUpdatedAtAttribute($value) {
        if (config('database.default') == 'mysql') {
            $this->attributes['updated_at'] = (new Carbon($value))->format('Y-m-d H:i:s');
        }elseif(config('database.default') == 'sqlsrv'){
            $this->attributes['updated_at'] = (new Carbon($value))->format('Ymd H:i:s');
        }else{
            $this->attributes['updated_at'] = (new Carbon($value))->format('Y-m-d H:i:s');
        }
    }

}

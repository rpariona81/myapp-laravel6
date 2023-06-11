<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class BK_People extends Model
{
    protected $table = 'bk_people';

    protected $primaryKey = 'id_backup';
    //
    /*protected $fillable = [
        'firstname', 'lastname','birthdate'
    ];*/
    protected $fillable = [
        'id','firstname', 'lastname','birthdate','created_by','updated_by'
    ];

    //protected $dateFormat = 'Ymd H:i:s';

    public function setCreatedAtAttribute( $value ) {
        if (config('database.default') == 'mysql') {
            $this->attributes['created_at'] = (new Carbon($value))->format('Y-m-d H:i:s');
        }elseif(config('database.default') == 'sqlsrv'){
            $this->attributes['created_at'] = (new Carbon($value))->format('Ymd H:i:s');
        }else{
            $this->attributes['created_at'] = (new Carbon($value))->format('Y-m-d H:i:s');
        }
    }

    public function setUpdatedAtAttribute( $value ) {
        if (config('database.default') == 'mysql') {
            $this->attributes['updated_at'] = (new Carbon($value))->format('Y-m-d H:i:s');
        }elseif(config('database.default') == 'sqlsrv'){
            $this->attributes['updated_at'] = (new Carbon($value))->format('Ymd H:i:s');
        }else{
            $this->attributes['updated_at'] = (new Carbon($value))->format('Y-m-d H:i:s');
        }
    }
}

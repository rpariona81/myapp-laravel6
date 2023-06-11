<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipamiento extends Model
{
    protected $table = 't_registro_equipamiento';
    //
    //protected $appends = ['age'];
    protected $fillable = [
        'id_instituto_carrera',
        'id_equipamiento',
        'p1_flag',
        'otro_equipamiento',
        'p1_tiene',
        'p2_cant_bueno',
        'p2_cant_regular',
        'p2_cant_malo',
        'p3_observacion',
        'estado',
        'created_by',
        'updated_by'
    ];

    //protected $with = ['region'];
    
    //protected $dateFormat = 'Ymd H:i:s';

    /*public function getAgeAttribute(){
        return date_diff(date_create($this->birthdate), date_create('now'))->y;
    }*/

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

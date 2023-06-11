<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Region;


class Instituto extends Model
{
    protected $table = 't_institutos';
    //
    //protected $appends = ['age'];
    protected $fillable = [
        'id_region',
        'cod_mod',
        'instituto',
        'es_licenciado',
        'rm_licenciamiento',
        'es_idex',
        'codgeo',
        'd_dpto',
        'd_prov',
        'd_dist',
        'created_by',
        'updated_by'
    ];

    protected $with = ['region','programas'];
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

    /**
     * Agregamos la conexion a la tabla t_regiones
     */
    public function region(){
        /*return $this
            ->belongsTo(Region::class,'t_regiones','id_region');*/
        /*return $this
            ->belongsTo('App\Models\Region','t_regiones','id_region');*/
        return $this->belongsTo('App\Models\Region','id_region');
    }

    /**
     * Agregamos la conexion a la tabla t_role_user
     */
    public function programas(){
        return $this
            ->belongsToMany('App\Models\Carrera', 't_institutos_carreras', 'id_instituto', 'id_carrera')->where('activo','=', 1);;
    }
    
}

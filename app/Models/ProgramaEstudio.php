<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramaEstudio extends Model
{
    
    protected $table = 't_institutos_carreras';

    //protected $dateFormat = 'Ymd H:i:s';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_instituto', 
        'id_carrera', 
        'fecha_autorizacion',
        'resol_autorizacion',
        'informacion_adicional',
        'programa_anterior',
        'activo',
        'created_by',
        'updated_by'
    ];

    protected $with = ['equipamiento','instituto','programa'];

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
     * Agregamos la conexion a la tabla t_registro_equipamiento
     */
    public function equipamiento(){
        return $this
            ->hasMany('App\Models\Equipamiento', 'id_instituto_carrera')->where('estado','=', 1);
    }

    /**
     * Agregamos la conexion a la tabla t_institutos
     */
    public function instituto(){
        return $this->belongsTo('App\Models\Instituto','id_instituto');
    }

    /**
     * Agregamos la conexion a la tabla t_institutos
     */
    public function programa(){
        return $this->belongsTo('App\Models\Carrera','id_carrera');
    }

}

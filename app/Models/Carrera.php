<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 't_carreras';
    //
    //protected $appends = ['age'];
    protected $fillable = [
        'alias_carrera', 
        'carrera',
        'carrera_digitacion',
        'cod_carrera',
        'cod_generado',
        'observacion',
        'cnof',
        'sector_economico',
        'familia_productiva',
        'actividad_economica',
        'nivel_profesional',
        'cod_cnof',
        'denominacion',
        'titulacion',
        'grado_academico',
        'fuente_minedu',
        'creditos',
        'nro_horas',
        'vigencia',
        'estado',
        'created_by',
        'updated_by'
    ];

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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    
    protected $table = 't_carreras_equipamiento';

    //protected $dateFormat = 'Ymd H:i:s';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_carrera', 
        'id_matriz', 
        'equipamiento_original',
        'categoria',
        'ratio_estudiante',
        'detalle_grupo_otros',
        'observaciones',
        'activo',
        'costo_unitario',
        'fuente_consulta',
        'equipo_costeado',
        'es_basico',
        'referencia_matriz',
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

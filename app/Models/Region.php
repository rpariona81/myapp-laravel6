<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Instituto;

class Region extends Model
{
    protected $table = 't_regiones';
    //
    //protected $appends = ['age'];
    protected $fillable = [
        'codregion',
        'region', 
        'region_alias', 
        'region_politica', 
        'folder', 
        'url_folder', 
        'ruta_alterna' 
    ];

    //protected $with = ['institutos'];

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

    /*public function institutos(){
        return $this->hasMany(Instituto::class, 'id_region');
    }*/
    
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use App\Models\Session;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 't_users';

    //protected $dateFormat = 'Ymd H:i:s';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','logged_in_at', 'logged_out_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    //protected $dates = ['logged_in_at', 'logged_out_at'];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //protected $with = 'sessions';
    protected $with = 'roles';

    public function setCreatedAtAttribute( $value ) {
        if (config('database.default') == 'mysql') {
            $this->attributes['created_at'] = (new Carbon($value))->format('Y-m-d H:i:s');
        }elseif(config('database.default') == 'sqlsrv'){
            $this->attributes['created_at'] = (new Carbon($value))->format('Ymd H:i:s');
        }else{
            $this->attributes['created_at'] = (new Carbon($value))->format('Y-m-d H:i:s');
        }
    }

    public function setLoggedOutAtAttribute( $value ) {
        if (config('database.default') == 'mysql') {
            $this->attributes['logged_out_at'] = (new Carbon($value))->format('Y-m-d H:i:s');
        }elseif(config('database.default') == 'sqlsrv'){
            $this->attributes['logged_out_at'] =  Carbon::parse($value)->format('Ymd H:i:s');
        
        }else{
            $this->attributes['logged_out_at'] = (new Carbon($value))->format('Y-m-d H:i:s');
        }
    }

    //https://gist.github.com/Ademking/d6132680539af6e9ccaab6c5fc6e0619
    //https://stackoverflow.com/questions/49999319/error-converting-nvarchar-to-datetime-data-type-using-laravel-and-mssql
    //https://stackoverflow.com/questions/35457412/laravel-sqlsrv-unable-to-create-timestamps

    // Fix SQL server date format 
	// Only for MSSQL
	public function fromDateTime($value)
	{
		if(env('DB_CONNECTION') == 'sqlsrv') {
			return Carbon::parse(parent::fromDateTime($value))->format('Y-m-d H:i:s');
		}
		return $value;
	}

    public function setLoggedInAtAttribute( $value ) {
        if (config('database.default') == 'mysql') {
            $this->attributes['logged_in_at'] = Carbon::parse($value)->format('Y-m-d H:i:s');
        }elseif(config('database.default') == 'sqlsrv'){
            $this->attributes['logged_in_at'] = Carbon::parse($value)->format('Ymd H:i:s');
        
        }else{
            $this->attributes['logged_in_at'] = Carbon::parse($value)->format('Y-m-d H:i:s');
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
     * Agregamos la conexion a la tabla t_role_user
     */
    public function roles(){
        return $this
            ->belongsToMany('App\Models\Role', 't_role_user', 'user_id', 'role_id');
            //->withTimestamps();
    }

    /**
     * Verifica la autorizacion
     */
    public function authorizeRoles($roles){
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'Esta acción no está autorizada.');
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('rolename', $role)->first()) {
            return true;
        }
        return false;
    }

    public function sessions(){
        return $this->hasMany(Session::class);
    }
}

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
        'username', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = ['sessions','roles'];

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
     * Agregamos la conexion a la tabla t_role_user
     */
    public function roles(){
        return $this
            ->belongsToMany('App\Models\Role', 't_role_user', 'user_id', 'role_id');
    }

    public function sessions(){
        return $this->hasMany(Session::class);
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

    

    //https://www.codechief.org/article/laravel-7-role-based-authentication-tutorial
    /*public function users(){
        return $this
            ->belongsToMany('App\Models\Role');
    }*/

    //https://laracasts.com/discuss/channels/laravel/add-a-new-attribute-in-authuser-session-in-laravel-53?page=1
    public function getRolenameAttribute(){
        {
            if ($this->roles->first()->rolename){

                return $this->roles()->rolename;
                }

        return null;

        }
    }

    public function getRoleIdAttribute(){
        {
            if ($this->roles->first()->role_id){

                return $this->roles()->role_id;
                }

        return null;

        }
    }

    public function role(){
        return $this->hasOne('App\Models\Role', 'user_id', 'role_id');
    }
    

}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Session;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 't_users';

    protected $dateFormat = 'Ymd h:i:s';

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

    protected $with = 'sessions';

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

<?php

namespace Laravelroles\Rolespermissions\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable{
    use Notifiable;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	protected $table = 'users';
	public $timestamps=true;
	
	public function roles(){
	return $this->belongsToMany('Laravelroles\Rolespermissions\Models\Role', 'roles_users', 'user_id', 'role_id');
	}
	
	public function hasAccess(array $permissions)
    {
        // check if the permission is available in any role
        foreach ($this->roles as $role) {
            if($role->hasAccess($permissions)) {
                return true;
            }
        }
        return false;
    }
    
}

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
	return $this->belongsToMany('App\Models\Role', 'roles_users', 'user_id', 'role_id');
	}
	
    public function can1($route){
		//$usr = $this;
		$roles = $this->roles();
		foreach($roles as $role){
			$perms = $role->routes();
			foreach($perms as $p){
				if($route == $p->name)
					return true;
					
				
			
			}
		}
		return false;	
	}
}

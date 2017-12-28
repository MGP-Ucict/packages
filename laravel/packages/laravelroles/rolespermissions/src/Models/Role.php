<?php

namespace Laravelroles\Rolespermissions\Models;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
//use Permission;


class Role extends Model
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'is_active',
    ];

   
	protected $table = 'roles';
	public $timestamps=true;
	
	public function routes(){
	//return $this->hasMany('Permission');
	return $this->belongsToMany('App\Models\Permission', 'permissions_roles', 'role_id', 'permission_id');
	}
	public function users(){
	
	return $this->belongsToMany('User');
	}
}

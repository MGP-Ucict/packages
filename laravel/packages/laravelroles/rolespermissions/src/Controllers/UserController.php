<?php

namespace Laravelroles\Rolespermissions\Controllers;

use Laravelroles\Rolespermissions\Models\Role;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use View;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{

public function UserCreate(Request $request){
	$role = Role::all();
	if($request->isMethod('get') && $request->input('submit')){
	
		$input = Input::get();
		$userObj = new User;
		$userObj->name = $input['name'];
		$userObj->email = $input['email'];
		$userObj->password = bcrypt($input['password']);
		$roles = $input['roles'];
		$userObj->is_active = (isset($input['is_active']))?$input['is_active']:0;
		$userObj->save();
		foreach($roles as $key=>$value){
			$rr = Role::find($value);
			
			$userObj->roles()->attach($rr);
		
		}
		
		
	
	}
	
	 return View::make('user_create')->with(array('roles'=>$role));

}


public function userUpdate(Request $request, $userId){
	$userObj = User::find($userId);
	$roles0 = User::find($userId)->roles()->get();
	
	$roles = Role::all();
	if($request->isMethod('get') && $request->input('submit')){
	
		$input = Input::get();
		
		$userObj->name = $input['name'];
		$userObj->email = $input['email'];
		$userObj->password = bcrypt($input['password']);
		$roles1 = $input['roles'];
		$userObj->is_active = (isset($input['is_active']))?true:false;
		
		foreach($roles0 as $key=>$value){
			$rr = Role::find($value);
			
			$userObj->roles()->detach($rr);
		
		}
		
		foreach($roles1 as $key=>$value){
			$rr = Role::find($value);
			
			$userObj->roles()->attach($rr);
		
		}
		
		$userObj->save();
	
	}
	
	$data = array(
	'userId'=>$userId,
	 'userObj'=>$userObj,
	 'roles'=>$roles,
	 'roles0'=>$roles0,
	
	
	);
	 return View::make('user_update')->with($data);

}
public function userDelete(Request $request, $userId){
	$userObj = User::find($userId);
	
	if($request->isMethod('get')){
	//dd('vvcd');
		
		
		$userObj->delete();
		
	
	}
	$userObjs = User::all();
	 return View::make('user_list')->with(array('userObjs'=>$userObjs));

}
public function userList(Request $request){
	$userObjs = User::all();
	
	
	 return View::make('user_list')->with(array('userObjs'=>$userObjs));

}

}
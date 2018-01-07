<?php
Route::any('/route_create', [
	'as'        => 'route_create',
	'middlewareGroups' => ['web', 'permissions.required'],
	'uses'      => 'Laravelroles\Rolespermissions\Controllers\RouteController@routeCreate',
 ]);
 Route::any('/route_update/{routeId}', [
	'as'        => 'route_update',
	'middleware' => ['web','permissions.required'],
	'uses'      => 'Laravelroles\Rolespermissions\Controllers\RouteController@routeUpdate',
 ]);
//Route::any('/route_create', 'Laravelroles\Rolespermissions\Controllers\RouteController@routeCreate')->name('route_create');//->middleware('can:access-permission');
//Route::post('/route_update/{routeId}', 'Laravelroles\Rolespermissions\Controllers\RouteController@routeUpdate')->name('route_update');
Route::get('/route_delete/{routeId}', 'Laravelroles\Rolespermissions\Controllers\RouteController@routeDelete')->name('route_delete');
 Route::get('/route_list', 'Laravelroles\Rolespermissions\Controllers\RouteController@routeList')->name('route_list');
 Route::get('/role_list', 'Laravelroles\Rolespermissions\Controllers\RoleController@roleList')->name('role_list');
 Route::get('/role_create', 'Laravelroles\Rolespermissions\Controllers\RoleController@roleCreate')->name('role_create');
 Route::get('/role_update/{roleId}', 'Laravelroles\Rolespermissions\Controllers\RoleController@roleUpdate')->name('role_update');
 Route::get('/role_delete/{roleId}', 'Laravelroles\Rolespermissions\Controllers\RoleController@roleDelete')->name('role_delete');
 Route::get('/user_create', 'Laravelroles\Rolespermissions\Controllers\UserController@userCreate')->name('user_create')->middleware('can:access-permission,"user_create"');
 Route::get('/user_update/{userId}', 'Laravelroles\Rolespermissions\Controllers\UserController@userUpdate')->name('user_update');
 Route::get('/user_delete/{userId}', 'Laravelroles\Rolespermissions\Controllers\UserController@userDelete')->name('user_delete');
 Route::get('/user_list', 'Laravelroles\Rolespermissions\Controllers\UserController@userList')->name('user_list');
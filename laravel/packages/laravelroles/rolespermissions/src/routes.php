Route::get('/home', 'HomeController@index')->name('home');
//Route::post('/route_create', function() {
  //  return view('route_create');
//})->name('route_create');
<?php
/*Route::post('/route_create', [
	'as'        => 'route_create',
	'uses'      => 'RouteController@routeCreate',
 ]);*/
Route::any('/route_create', 'RouteController@routeCreate')->name('route_create');
Route::post('/route_update/{routeId}', 'RouteController@routeUpdate')->name('route_update');
Route::get('/route_delete/{routeId}', 'RouteController@routeDelete')->name('route_delete');
 Route::get('/route_list', 'RouteController@routeList')->name('route_list');
 Route::get('/role_list', 'RoleController@roleList')->name('role_list');
 Route::get('/role_create', 'RoleController@roleCreate')->name('role_create');
 Route::get('/role_update/{roleId}', 'RoleController@roleUpdate')->name('role_update');
 Route::get('/role_delete/{roleId}', 'RoleController@roleDelete')->name('role_delete');
 Route::get('/user_create', 'UserController@userCreate')->name('user_create');
 Route::get('/user_update/{userId}', 'UserController@userUpdate')->name('user_update');
 Route::get('/user_delete/{userId}', 'UserController@userDelete')->name('user_delete');
 Route::get('/user_list', 'UserController@userList')->name('user_list');
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('category', 'CategoryController');

Route::group(['middleware' => 'auth'], function () {

	Route::group(['prefix' => 'permissions'], function () {

		Route::get('/', function (){
			$roles = Spatie\Permission\Models\Role::all()->toArray();
			$permissions = Spatie\Permission\Models\Permission::all()->toArray();
			dd($roles, $permissions);
		});

		Route::get('{role}/users', function ($role){
			$users = App\User::role('admin')->get()->toArray();
			dd($role, $users);
		});

		Route::get('{role}/give', function ($role){
			Auth::user()->assignRole($role);
			return redirect('permissions/'.$role.'/users');
		});

		Route::get('create', function (){
			$role = Spatie\Permission\Models\Role::create(['name' => 'admin']);
			$permission = Spatie\Permission\Models\Permission::create(['name' => 'system admin']);
			return redirect('permissions');
		});

	});
	
	Route::get('user/profile', function () {
	// Uses Auth Middleware
	});
});
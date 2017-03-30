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

Auth::routes();

Route::get('/home', 'PostController@index');
Route::get('/', 'PostController@index')->name('post.index');
Route::get('post/{post}', 'PostController@show')->name('post.show');

Route::group(['prefix' => 'comment'], function(){
  Route::post('store/{post}', 'PostController@addComment')->name('comment.store');
});

Route::group(['middleware' => 'auth'], function () {

	Route::resource('category', 'CategoryController', ['except' => [
		'index', 'show'
	]]);

	Route::group(['prefix' => 'comment'], function(){
	  Route::get('approve/{comment}', 'CommentController@approve')->name('comment.approve');
		Route::delete('destroy/{comment}', 'CommentController@destroy')->name('comment.destroy');
	});

	Route::get('post/trashed', 'PostController@trashed')->name('post.trashed');
	Route::get('post/{id}/restore', 'PostController@restore')->name('post.restore');
	Route::delete('post/{id}/delete', 'PostController@delete')->name('post.delete');
	Route::resource('post', 'PhotoController', ['except' => [
		'index', 'show'
	]]);

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

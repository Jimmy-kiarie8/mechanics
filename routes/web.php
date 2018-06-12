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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/manage', function () {
    	/*$newrole = Auth::user()->roles;
    	foreach ($newrole as $name) {
    		$rolename = $name->name;
    	}*/
    	// return view('welcome', compact('rolename', 'company_logo'));
    	return view('welcome');
});

Route::get('manage/${name}', function ()
{
	return redirect('/');
})->where('name', '[A-Za-z]+');

Route::resource('users', 'UserController');


Route::post('/getUsers', 'UserController@getUsers')->name('getUsers');

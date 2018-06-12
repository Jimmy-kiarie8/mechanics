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
Route::resource('file', 'HomeController');


Route::post('/getUsers', 'UserController@getUsers')->name('getUsers');


Route::post('/attachments/store', 'HomeController@store')->name('store-attachments');
Route::post('/attachments', 'HomeController@pullAttachments')->name('pull-attachments');
Route::delete('/attachments/', 'HomeController@deleteAttachment')->name('delete-attachment');
Route::post('/attachments/categories', 'HomeController@getCategories')->name('pull-categories');
Route::post('/categories', 'HomeController@storeCategories');
Route::post('/getCategory', 'HomeController@getCategory');

Route::post('/download', 'CategoryController@download')->name('download');
Route::post('/getLogedDocs', 'CategoryController@getLogedDocs')->name('getLogedDocs');

Route::post('/comments/{id}', 'CommentsController@comments')->name('comments');
Route::post('/getComments', 'CommentsController@getComments')->name('getComments');


<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  	Route::get('signup/activate/{token}', 'AuthController@signupActivate');
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

// password Reset
Route::group([
    'namespace' => 'Auth',
    'middleware' => 'api',
    'prefix' => 'password'
], function () {
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});

/*Route::group([

    // 'middleware' => 'api',
    'prefix' => 'auth'

], function () {
	Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('payload', 'AuthController@payload');

    Route::group(['middleware' => 'jwt.refresh'], function(){
    	Route::get('refresh', 'AuthController@refresh');
    });

    Route::group(['middleware' => 'jwt.auth'], function(){
		Route::get('user', 'AuthController@user');
		Route::post('logout', 'AuthController@logout');
	});

});*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

      'middleware' => 'auth:api',
    // 'middleware' => 'api',
    'prefix' => 'getData'

], function () {

	Route::get('/getUsers', 'UserController@getUsers')->name('getUsers');
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
	Route::resource('jobs', 'JobsController');
	Route::resource('email', 'EmailController');
	Route::resource('blog', 'BlogController');


	Route::post('/profile/{id}', 'UserController@profile')->name('profile');

	Route::get('/getUsers', 'UserController@getUsers')->name('getUsers');
	Route::post('/userUpdate', 'UserController@userUpdate')->name('userUpdate');


	Route::post('/attachments/store', 'HomeController@store')->name('store-attachments');
	Route::post('/attachments', 'HomeController@pullAttachments')->name('pull-attachments');
	Route::delete('/attachments/', 'HomeController@deleteAttachment')->name('delete-attachment');
	Route::post('/attachments/categories', 'HomeController@getCategories')->name('pull-categories');
	Route::post('/categories', 'HomeController@storeCategories');
	Route::get('/getCategory', 'HomeController@getCategory');

	Route::post('/download', 'CategoryController@download')->name('download');
	Route::get('/getLogedDocs', 'CategoryController@getLogedDocs')->name('getLogedDocs');

	Route::post('/comments/{id}', 'CommentsController@comments')->name('comments');
	Route::get('/getComments', 'CommentsController@getComments')->name('getComments');
	Route::get('/getAllComments/${id}', 'CommentsController@getAllComments')->name('getAllComments');



	// CV
	Route::post('/experience/{id}', 'ResumeController@experience')->name('experience');
	Route::post('/education/{id}', 'ResumeController@education')->name('education');
	Route::post('/personal/{id}', 'ResumeController@personal')->name('personal');
	Route::post('/skills/{id}', 'ResumeController@skills')->name('skills');


	Route::get('/getExperience', 'ResumeController@getExperience')->name('getExperience');
	Route::get('/getEducation', 'ResumeController@getEducation')->name('getEducation');
	Route::get('/getPersonal', 'ResumeController@getPersonal')->name('getPersonal');
	Route::get('/getSkills', 'ResumeController@getSkills')->name('getSkills');
	Route::get('/getMeckSkills', 'ResumeController@getMeckSkills')->name('getMeckSkills');

	Route::post('/updateJobFalse/{id}', 'JobsController@updateJobFalse')->name('updateJobFalse');
	Route::post('/updateJobTrue/{id}', 'JobsController@updateJobTrue')->name('updateJobTrue');
	Route::get('/getJobs/{id}', 'JobsController@getJobs')->name('getJobs');
	Route::get('/getJobInfo/{id}', 'JobsController@getJobInfo')->name('getJobInfo');
	Route::post('/updateReqTrue/{id}', 'JobsController@updateReqTrue')->name('updateReqTrue');
	Route::post('/updateReqFalse/{id}', 'JobsController@updateReqFalse')->name('updateReqFalse');


	
	// E-MAILS
	Route::post('/sendmail', 'EmailController@sendmail')->name('sendmail');
	Route::get('/getsubscribers', 'EmailController@getsubscribers')->name('getsubscribers');
	Route::post('/subscribe', 'EmailController@subscribe')->name('subscribe');
	Route::post('/refresh/{id}', 'EmailController@refresh')->name('refresh');


	Route::get('/slack', 'EmailController@slack');
	Route::get('/slacks', 'EmailController@slacks');

	Route::get('/getunsubscribed', 'EmailController@getunsubscribed')->name('getunsubscribed');

	// Blog	
	Route::get('/getBlog', 'BlogController@getBlog')->name('getBlog');
	Route::post('/blogImage/{id}', 'BlogController@blogImage')->name('blogImage');
	Route::get('/getImgBlog/{id}', 'BlogController@getImgBlog')->name('getImgBlog');
	Route::post('/BlogImage', 'BlogController@BlogImage')->name('BlogImage');

	// Blog	Comments
	Route::get('/getPostCom', 'CommentsController@getPostCom')->name('getPostCom');
	Route::get('/getSingleCom/{id}', 'CommentsController@getSingleCom')->name('getSingleCom');
	Route::post('/Postcom/{id}', 'CommentsController@Postcom')->name('Postcom');
	Route::get('/getBlogC/{id}', 'CommentsController@getBlogC')->name('getBlogC');
});



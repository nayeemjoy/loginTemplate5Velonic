<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	return Redirect::route('dashboard');
});


Route::group(['middleware' => 'guest'], function(){
	Route::controller('password', 'RemindersController');
	Route::get('login', ['as'=>'login','uses' => 'Auth\AuthController@login']);
	Route::get('user/create', ['as'=>'user.create','uses' => 'UsersController@create']);
	Route::post('user/store', ['as'=>'user.store','uses' => 'UsersController@store']);
	Route::post('login', array('uses' => 'Auth\AuthController@doLogin'));


	// social login route
	Route::get('login/fb', ['as'=>'login/fb','uses' => 'SocialController@loginWithFacebook']);
	Route::get('login/gp', ['as'=>'login/gp','uses' => 'SocialController@loginWithGoogle']);

});



Route::group(array('middleware' => 'auth'), function()
{

	Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);
	Route::get('profile', ['as' => 'profile', 'uses' => 'UsersController@profile']);
	// Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'Auth\AuthController@dashboard'));
	Route::get('change-password', array('as' => 'password.change', 'uses' => 'Auth\AuthController@changePassword'));
	Route::post('change-password', array('as' => 'password.doChange', 'uses' => 'Auth\AuthController@doChangePassword'));
	Route::group(['prefix' => 'admin'], function()
	{
		Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'Auth\AuthController@dashboard'));
		Route::group(['middleware' => ['role:admin']], function()
		{
			Route::get('users', array('as' => 'user.index', 'uses' => 'UsersController@index'));
			Route::get('user/create', array('as' => 'user.create', 'uses' => 'UsersController@create'));
			Route::post('user/store', array('as' => 'user.store', 'uses' => 'UsersController@store'));
			Route::delete('user/delete/{id}', array('as' => 'user.delete', 'uses' => 'UsersController@destroy'));

		});

		
		Route::get('passportreceives', array('as' => 'passportreceive.index', 'uses' => 'PassportReceiveController@index'));
		Route::get('passportreceive/create', array('as' => 'passportreceive.create', 'uses' => 'PassportReceiveController@create'));
		Route::post('passportreceive/store', array('as' => 'passportreceive.store', 'uses' => 'PassportReceiveController@store'));
		Route::get('passportreceive/edit/{id}', array('as' => 'passportreceive.edit', 'uses' => 'PassportReceiveController@edit'));
		Route::put('passportreceive/update/{id}', array('as' => 'passportreceive.update', 'uses' => 'PassportReceiveController@update'));
		Route::delete('passportreceive/delete/{id}', array('as' => 'passportreceive.delete', 'uses' => 'PassportReceiveController@destroy'));


		Route::get('passportmakings', array('as' => 'passportmaking.index', 'uses' => 'PassportMakingController@index'));
		Route::get('passportmaking/create', array('as' => 'passportmaking.create', 'uses' => 'PassportMakingController@create'));
		Route::post('passportmaking/store', array('as' => 'passportmaking.store', 'uses' => 'PassportMakingController@store'));
		Route::get('passportmaking/edit/{id}', array('as' => 'passportmaking.edit', 'uses' => 'PassportMakingController@edit'));
		Route::put('passportmaking/update/{id}', array('as' => 'passportmaking.update', 'uses' => 'PassportMakingController@update'));
		Route::delete('passportmaking/delete/{id}', array('as' => 'passportmaking.delete', 'uses' => 'PassportMakingController@destroy'));

	});

});







// Route::get('profile1',function(){
// 	return View::make('template.profile')->with('title','Profile');
// });

// Route::get('timeline',function(){
// 	return View::make('template.timeline')->with('title','Timeline');
// });

// Route::get('widgets',function(){
// 	return View::make('template.widgets')->with('title','Widgets');
// });

// Route::get('portlets',function(){
// 	return View::make('template.portlets')->with('title','Portlets');
// });

// Route::get('panel',function(){
// 	return View::make('template.panel')->with('title','Panel');
// });

// Route::get('chart_x',function(){
// 	return View::make('template.chart_x')->with('title','Chart_x');
// });


// Route::get('index2',function(){
// 	return View::make('template.dashboard')->with('title','Dashboard');
// });

// Route::get('gmap',function(){
// 	return View::make('template.gmap')->with('title','GMap');
// });

// Route::get('friends',function(){
// 	return View::make('template.friends')->with('title','Friends');
// });

// Route::get('adForm',function(){
// 	return View::make('template.advanced_form')->with('title','Advanced Form');//problem
// });


// Route::get('form-wizard',function(){
// 	return View::make('template.form_wizard')->with('title','Form Wizard');
// });

// Route::get('dataTable',function(){
// 	return View::make('template.datatable')->with('title','Data Table');
// });


Route::get('dataTable',function(){
	return View::make('template.datatable')->with('title','Data Table');
});


Route::get('EditableDataTable',function(){
	return View::make('template.editDataTable')->with('title','Editable Data Table');
});




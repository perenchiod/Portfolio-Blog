<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::resource('posts', 'PostsController');

Route::get('/login' , 'HomeController@showLogin');
Route::post('/login' , 'HomeController@doLogin');
Route::get('/logout' , 'HomeController@doLogout');

Route::get('/sayhello', 'HomeController@sayHello');
Route::get('/resume', 'HomeController@linkResume');
Route::get('/portfolio', 'HomeController@linkPortfolio');
Route::get('/contact', 'HomeController@linkContact');
Route::get('whackamole' , 'HomeController@linkWhackaMole');

Route::get('/', 'HomeController@showWelcome');

Route::get('/name/{name?}', function($name = 'world')
{
	$data = array('name' => $name);
	return View::make('helloName')->with($data);

})
->where('name', '[A-z0-9]+');

Route::get('/rolldice/{guess?}' , function ($guess)
{
	$randomRoll = floor(rand(1,6));
	
	$data = array('guess' => $guess, 
				  'roll' => $randomRoll);
	return View::make('rollDice')->with($data);
});

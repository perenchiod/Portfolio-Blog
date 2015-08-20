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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/name/{name?}', function($name = 'world')
{
	$data = array('name' => $name);
	return View::make('helloName')->with($data);

})
->where('name', '[A-z0-9]+');

Route::get('/resume' , function()
{
	return View::make('resume');
});

Route::get('/portfolio' , function()
{
	return View::make('portfolio');
});

Route::get('/rolldice/{guess?}' , function ($guess)
{
	$randomRoll = floor(rand(1,6));
	
	$data = array('guess' => $guess, 
				  'roll' => $randomRoll);
	return View::make('rollDice')->with($data);
});

Route::get('contact' , function()
{
	return View::make('contact');
});

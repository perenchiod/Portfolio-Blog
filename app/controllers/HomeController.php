<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. Thats great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|
	*/
	

	public function showWelcome($name = 'bill')
    {
        return View::make('portfolio')->with($name);

    }

    public function linkResume()
    {
        return View::make('resume');
    }

    public function linkPortfolio()
    {
        return View::make('portfolio');
    }

    public function linkContact() 
    {
    	return View::make('contact');
    }

    public function linkWhackaMole() 
    {
        return View::make('whackamole');
    }


}

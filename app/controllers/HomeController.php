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
	
    public function displayTag($tag)
    {
        $query = Post::with('user');
        
        if(strpos($tag, "+")) {
            $firstKey = substr($tag, 0 , strpos($tag, "+"));
            $query->where('tags' , '=' , "$firstKey");
            $query->orWhere('tags' , 'like' , '%'."$firstKey".'%');


        }else {
            $query->where('tags' , '=' , "$tag");
            $query->orWhere('tags' , 'like' , '%'."$tag".'%');
        }
        
        $showQuery = $query->orderBy('created_at', 'desc')->paginate(5);
        return View::make('/tag')->with('tags' , $showQuery);
    }

    public function showLogin() 
    {
        return View::make('login');
    }

    public function doLogin() 
    {
        $username = Input::get('username');
        $password = Input::get('password');
        if (Auth::attempt(array('username' => $username, 'password' => $password))) {
            return Redirect::intended('/posts');
        } else {
            // Display session flash message , log email that tried to authenticate
            Session::flash('failedLogin' , 'Incorrect username or password.');
            Log::warning('{{{$username}}} tried to login.');
            return Redirect::action('HomeController@showLogin');
}
    }

    public function doLogout() 
    {
        Auth::logout();
        Session::flash('loggedOut' , 'Successfully logged out.');
        return Redirect::to('/posts');
    }


	public function showWelcome()
    {
        return View::make('portfolio');

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
        return View::make('/whackaMole');
    }

      public function linksimpleSimon() 
    {
        return View::make('/simplesimon');
    }


}

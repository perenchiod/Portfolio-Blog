<?php

class PostsController extends \BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('auth' , array('except' => array('index' , 'show')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$query = Post::with('user');
		if (Input::has('search')) {
			$search = Input::get('search');
			$query->where('title' , 'like' , '%' ."$search" . '%')
				->orWhereHas('user' , function($q) use ($search) {
				$q->where('first_name' , 'like' , "%" . "$search" . "%");
			})->orWhereHas('user' , function($q) use ($search) {
				$q->where('tags' , 'like' , "%" . "$search" . "%");
			})->orWhereHas('user' , function($q) use ($search) {
				$q->where('last_name' , 'like' , "%" . "$search" . "%");
			});
        }
        $posts = $query->orderBy('created_at', 'desc')->paginate(5);
        return View::make('posts.index')->with('posts', $posts);
    }


	/**
	 * Show the form for creating a new resource.
	 * Need a view to a form
	 *
	 * @return Response
	 */
	public function create()
	{
		Log::info('This is some useful information.');
		return View::make('posts/create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), Post::$rules);
		
		if ($validator->fails()) {
			Session::flash('errorMessage' , 'Something went wrong here!');
			return Redirect::back()->withErrors($validator)->withInput();
		} else {
			$post = new Post();
			$post->title = Input::get('title');
			$post->body = Input::get('body');
			$post->user_id = Auth::id();

			if (Input::hasFile('picture')) {
				if (Input::file('picture')->isValid()) {
					Storage::upload(Input::file('picture'), "$post->picture" . "jpg");
		        } 
		        $post->picture = Input::file('picture');
		    }

		    if(Input::has('tags')) {
		    	$post->tags = implode(', ', Input::get('tags'));
		    }
			$post->save();
			$posts = Post::paginate(5);
			Session::flash('goodMessage' , 'All went right here!');
			return View::make('posts/index')->with('posts' , $posts);
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::with('user')->find($id);
		if(!$post) {
			Session::flash('errorMessage' , "Blog post was not found");
			App::abort(404);
		} 
		return View::make('posts.show')->with(array('post' => $post));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);
		return View::make("posts/edit")->with('post' , $post);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Validator::make(Input::all(), Post::$rules);
		
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		} else {
			$post = Post::find($id);
			$post->title = Input::get('title');
			$post->body = Input::get('body');
			if(Input::has('tags')) {
				$post->tags = Input::get('tags');
			}
			$post->user_id = Auth::id();
			$post->save();

			return View::make('posts/show')->with('post' , $post);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::find($id);
		$post->delete();
 		// Modify destroy() to send back JSON if it's been requested
        if (Request::wantsJson()) {
            return Response::json(array('Response' , "Good!"));
        } else {
            return Redirect::action('PostsController@index');
        }	
    }

    //return a view in the posts directory called manage.blade.php
    public function getManage()
    {
    	return View::make('posts/manage');
    }

    /* query for all the posts in the database and return them as a JSON array
    	will use Response::json() for this. */
    public function getList() 
    {
    	$posts = Post::with('user')->get();
		return Response::json($posts);
    }


}

<?php

class PostsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::paginate(5);
		return View::make('posts.index')->with('posts' , $posts);
	}


	/**
	 * Show the form for creating a new resource.
	 * Need a view to a form
	 *
	 * @return Response
	 */
	public function create()
	{
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
			return Redirect::back()->withErrors($validator)->withInput();
		} else {
			$post = new Post();
			$post->title = Input::get('title');
			$post->body = Input::get('body');
			$post->save();

			$posts = Post::all();
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
		$post = Post::find($id);
		return View::make('posts/show')->with('post' , $post);
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
			$post = new Post();
			$post->title = Input::get('title');
			$post->body = Input::get('body');
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
		return Redirect::action('PostsController@index');
	}


}

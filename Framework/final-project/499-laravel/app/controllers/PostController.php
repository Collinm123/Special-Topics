<?php 

class PostController extends BaseController{

	public function postsFeed()
	{
		$name = Session::get('name');

		$photo = Session::get('photo');

		$posts = Post::orderBy('id', 'DESC')->get();
		return View::make('/admin/adminFeed', [
				'name' => $name,
				'photo' => $photo,
				'posts' => $posts
			]);
	}

	public function createPost()
	{
		$validation = Post::validate(Input::all());


		if($validation->passes()){
			$post = new Post();
			$post->body = Input::get('body');
			$post->name = Session::get('name');
			$post->photo = Session::get('photo');
			$post->save();


			return $this->updateFeed($post);

		}else{
			return Redirect::to('/posts/feed')
			->withInput()
			->with('errors', $validation->messages());
		}
	}


	public function updateFeed($post)
	{
		$name = Session::get('name');
		$photo = Session::get('photo');

		//Retrieve the posts for the feed
		$posts = Post::orderBy('id', 'DESC')->get();

		//Build the view
		return View::make('/admin/adminFeed', [
			'name' => $name,
			'photo' => $photo,
			'posts' => $posts
		])
		->with('flash_notice', 'You\'re post was submitted.');

	}

}
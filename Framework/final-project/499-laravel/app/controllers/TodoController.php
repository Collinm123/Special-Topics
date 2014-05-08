<?php 

class TodoController extends BaseController{

	public function todosFeed()
	{
		$name = Session::get('name');

		$photo = Session::get('photo');

		$todos = Todo::orderBy('id', 'DESC')->get();
		return View::make('/admin/adminTodos', [
				'name' => $name,
				'photo' => $photo,
				'todos' => $todos
			]);
	}

	public function createTodo()
	{
		$validation = Todo::validate(Input::all());


		if($validation->passes()){
			$todo = new Todo();
			$todo->body = Input::get('body');
			$todo->name = Session::get('name');
			$todo->save();


			return $this->updateFeed($todo);

		}else{
			return Redirect::to('/todos/feed')
			->withInput()
			->with('errors', $validation->messages());
		}
	}


	public function updateFeed($todo)
	{
		$name = Session::get('name');
		$photo = Session::get('photo');
		//Retrieve the todos for the feed
		$todos = Todo::orderBy('id', 'DESC')->get();

		//Build the view
		return View::make('/admin/adminTodos', [
			'name' => $name,
			'photo' => $photo,
			'todos' => $todos
		])
		->with('flash_notice', 'You\'re todo was submitted.');

	}

	public function deleteTodo($id)
	{
		$todo_id = $id;
		$todo = Todo::find($todo_id);
		$task = $todo->body;
		$todo->delete();
		return Redirect::to('todos/feed')
		->with('flash_notice', 'You completed: '.$task);
	}

}
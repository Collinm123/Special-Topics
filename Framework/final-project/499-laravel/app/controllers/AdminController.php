<?php 

class AdminController extends BaseController{

	public function login()
	{
		$user = [
            'username' => Input::get('username'),
            'password' => Input::get('password')
        ];
        
        if (Auth::attempt($user)) {
            return Redirect::to('/')
                ->with('flash_notice', 'You are successfully logged in.');
        }
        
        // authentication failure! lets go back to the login page
        return Redirect::to('/')
            ->with('flash_error', 'Your username/password combination was incorrect.')
            ->withInput();
	}

	public function logout()
	{
		Auth::logout();

    	return Redirect::to('/')
        ->with('flash_notice', 'You are successfully logged out.');

	}


	public function newAdmin()
	{
		$data = User::all();
		return View::make('admin/newAdmin', array(
			'users' => $data

		));
	}

	public function createAdmin()
	{
		$validation = User::validate(Input::all());

		if($validation->passes()){
			$user = new User();
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->save();

			return Redirect::to('admin/new')
        	->with('flash_notice', 'You\'ve successfully registered a new Admin.');
		}else{
			return Redirect::to('admin/new')
			->withInput()
			->with('errors', $validation->messages());
		}


	}

	public function deleteAdmin($id)
	{
		$user_id = $id;
		$user = User::find($user_id);
		$user->delete();
		return Redirect::to('admin/new')
		->with('flash_notice', 'Admin with ID: '.$user_id.' Deleted');
	}



}




 ?>
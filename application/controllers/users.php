<?php

class Users_Controller extends Base_Controller{
	


	public function action_index(){
		echo "Index";
	}

	public function action_show(){
		echo "show";
	}

	public function action_edit(){
		echo "edit";
	}

	public function action_new(){
		echo "new";
	}

	public function action_create(){
		echo "Hello";
	}

	public function action_update(){
		echo "Hello";
	}

	public function action_delete(){
		echo "Hello";
	}

	public function action_login(){
		return View::make('users.login');
	}

	public function action_check(){
		$credentials = array(
			'username' => Input::get('email'),
			'password' => Input::get('password')	
		);

		if(Auth::attempt($credentials)){
			return Redirect::to('dashboard');
		} 

		return Redirect::to('login');


	}	

	public function action_test(){
		$user = new User();

		$user->email = 'ryan-tn-fc@hotmail.co.uk';
		$user->password = Hash::make('tyuuisk3');

		//$user->save();

		echo "test data created!";
	}

	public function action_dashboard(){
		return View::make('users.dashboard');
	}	

	public function action_logout(){
		Auth::logout();
		return View::make('users.login');
	}				

}
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
		echo "login";
	}

	public function action_check(){
		echo "Hello";
	}	

	public function action_test(){
		$user = new User();

		$user->email = 'ryan-tn-fc@hotmail.co.uk';
		$user->password = Hash::make('tyuuisk3');

		//$user->save();

		echo "test data created!";
	}			

}
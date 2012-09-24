<?php 

class Post extends Eloquent{
	
	public function user(){
		$this->belongs_to('User');
	}

}
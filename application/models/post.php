<?php 

class Post extends Eloquent{
	
	public function user(){
		return $this->belongs_to('User');
	}

	public function images(){
		return $this->has_many('Image');
	}

}
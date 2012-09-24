<?php

class Image extends Eloquent{

	public function post(){
		return $this->belongs_to('Post');
	}

}
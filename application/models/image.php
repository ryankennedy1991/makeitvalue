<?php

class Image extends Eloquent{

	public function post(){
		$this->belongs_to('Post');
	}

}
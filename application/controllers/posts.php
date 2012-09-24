<?php 

class Posts_Controller extends Base_Controller{


	// show all posts - ALL
	public function action_index(){
		$posts = Post::order_by('created_at', 'desc')->get();
		return View::make('posts.all')->with('posts', $posts);
	}

	// edit form - Edit
	public function action_edit($id){
		$post = Post::find($id);
		return View::make('posts.edit')->with('post', $post);
	}

	// show single post - SHOW
	public function action_show($segment){
		if(is_numeric($segment)){
			$post = Post::where('id', '=', $segment)->first();
		} else {	
			$post = Post::where('slug', '=', $segment)->first();
		}

		if ($post){
			return View::make('posts.show')
						 ->with('content', $post);
		} 
			return Response::error('404');

	}

	// new form - NEW
	public function action_new(){
		return View::make('posts.new');
	}






	// create new post - CREATE
	public function action_create(){
		/*$slug = $this->slugger(Input::get('title'));

		$db = Post::create(array(
				'post_title' => Input::get('title'),
				'post_content' => Input::get('content'),
				'excerpt' => Input::get('excerpt'),
				'slug' => $slug,
				'user_id' => Auth::user()->id,
			));
		
		if(!$db){
			Log::write('posts.create', 'Post was not created, post->create() returned false.');
			 return Redirect::to('posts/new')
		                 ->with('error_create', 'Unable to create post!');
		} */ 

		$db = Post::find(2); 

		$input = Input::all();
 
        $rules = array(
            'image' => 'required|image|max:200', //photo upload must be an image and must not exceed 1000kb
        );

        $messages = array(
        	'image_required' => 'Please select an image for upload!',
        	'image_max' => 'Make sure image is no larger than 500kb',
        	'image_image' => 'Please select an image file'
        );

        $validation = Validator::make($input, $rules, $messages);
        if( $validation->fails() ) {
            return Redirect::to('posts/new')->with_errors($validation);
        }

        $extension = File::extension($input['image']['name']);
        $directory = path('public').'uploads/'.sha1(Auth::user()->id);
        $filename = sha1(Auth::user()->id.time()).".{$extension}";
        $upload_success = Input::upload('image', $directory, $filename);

        if( $upload_success ) {


            $photo = new Image(array(
            	'image_name' => $filename,
                'image_location' => '/uploads/'.sha1(Auth::user()->id).'/'.$filename,
                'image_size' => $input['image']['size'],
                'image_type' => $extension
            ));

        $db->images()->insert($photo);
    	}



		return Redirect::to('posts/new')
		                 ->with('status_create', 'New Post Created')
					     ->with('id', $db->id);
	}


	// update post - UPDATE
	public function action_update($id){
		
		$post = Post::find($id);

		$slug = $this->slugger(Input::get('title'));

		if($post->post_title == Input::get('title') && $post->post_content == Input::get('content')){
			return Redirect::to("posts/$id/edit")->with('status_update', 'post updated');
		}

		$post->post_title = Input::get('title');
		$post->post_content = Input::get('content');
		$post->slug = $slug;
		$success = $post->save();

		if(!$success){
			Log::write('posts/:id/edit', 'could not update post - $post->save returned false');
			return Redirect::to("posts/$id/edit")->with('error_update', 'post could not be updated');
		}

		return Redirect::to("posts/$id/edit")->with('status_update', 'post updated');

	}

	// delete post - DELETE
	public function action_delete($id){
		
		if(Auth::check()){
			$post = Post::find($id);
			$a = $post->delete();
			
			if(!$a){
				Log::write('posts.delete', 'failed to delete single post, post->delete() return false');
				return Redirect::to('posts')->with('error_delete', 'post could not be deleted');
			}

			return Redirect::to('posts')->with('status_delete', 'Post was deleted');
		}

	}

	



	private function slugger($title){
		$a = explode(' ', $title);

		foreach($a as &$t){
			if(strpos($t, '-')){
				explode(' ', $t);	
			}
		}

		if(count($a) > 5){
			$a = array_slice($a, 0, 4);
		}

		$f = implode('-', $a);

		return $f;

	}



}
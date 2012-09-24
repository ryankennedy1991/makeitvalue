@layout('layouts/users')



@section('logged')

Logged in as <a href="#" class="navbar-link">Admin</a> | <a href="{{URL::to('logout')}}" class="navbar-link">Logout</a>
@endsection

@section('subnav')
<li class="nav-header">Search Posts</li>
               <li><form class="form-search">
  <input type="text" class="input-medium search-query">
  <button type="submit" class="btn">Search</button>
</form></li>
			  <li class="nav-header">Posts Options</li>
              <li><a href="{{ URL::to('posts/new') }}">Create New Post</a></li>
              <li><a href="{{ URL::to('posts') }}">View All Posts</a></li>            

@endsection


@section('nav')
<li><a href="{{ URL::to('dashboard') }}">Home</a></li>
              <li  class="active"><a href="{{ URL::to('posts') }}">Posts</a></li>
              <li><a href="{{ URL::to('users') }}">Users</a></li>
              <li><a href="{{ URL::to('settings') }}">Settings</a></li>
@endsection





@section('content')
	<div class="hero-unit">
		<h1>Create New Post</h1>
	</div>

  @include('posts.success')
  @include('posts.error')  

	<div class="row-fluid">
{{ Form::open_for_files('posts/new', 'POST') }}
              {{ Form::label('title', 'Post Title') }}
              {{ Form::text('title') }}
              {{ Form::label('content', 'Post Content') }}
              {{ Form::textarea('content') }}
              {{ Form::label('excerpt', 'Post Excerpt') }}
              {{ Form::text('excerpt') }}
              <hr>
              {{ Form::label('image', 'Image') }}
              {{ Form::file('image') }}
              {{ Form::submit('Create Post', array('class' => 'btn btn-success')) }}

              {{ Form::close() }}



	</div>

@endsection 







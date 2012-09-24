@layout('layouts.users')



@section('nav')
  <li class="active"><a href="" >Home</a></li>
  <li><a href="" >Posts</a></li>
  <li><a href="" >Users</a></li>

@endsection





@section('subnav')
              <li class="nav-header">Quick-menu</li>
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">New Post</a></li>
              <li><a href="#">New User</a></li>
              <li><a href="#">Settings</a></li>
@endsection






@section('content')
  <div class="hero-unit">
    <h1>Welcome!</h1>
  </div>
@endsection
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Users</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="{{ URL::to_asset('css/bootstrap.css') }}" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="{{ URL::to_asset('css/bootstrap-responsive.css') }}" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Project name</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link">Username</a> |
             <a href="{{ URL::to('logout') }}" class="navbar-link">Logout</a>
            </p>
            <ul class="nav">
               @section('nav')
                @yield_section
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              @section('subnav')
              @yield_section
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
        @section('content')
        @yield_section
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Make It Value 2012</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ URL::to_asset('js/jquery-1.8.0.min.js') }}"></script>
    <script src="{{ URL::to_asset('js/bootstrap-transition.js') }}"></script>
    <script src="{{ URL::to_asset('js/bootstrap-alert.js') }}"></script>
    <script src="{{ URL::to_asset('js/bootstrap-modal.js') }}"></script>
    <script src="{{ URL::to_asset('js/bootstrap-dropdown.js') }}"></script>
    <script src="{{ URL::to_asset('js/bootstrap-scrollspy.js') }}"></script>
    <script src="{{ URL::to_asset('js/bootstrap-tab.js') }}"></script>
    <script src="{{ URL::to_asset('js/bootstrap-tooltip.js') }}"></script>
    <script src="{{ URL::to_asset('js/bootstrap-popover.js') }}"></script>
    <script src="{{ URL::to_asset('js/bootstrap-button.js') }}"></script>
    <script src="{{ URL::to_asset('js/bootstrap-collapse.js') }}"></script>
    <script src="{{ URL::to_asset('js/bootstrap-carousel.js') }}"></script>
    <script src="{{ URL::to_asset('js/bootstrap-typeahead.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to_asset('js/tiny_mce/tiny_mce.js') }}"></script>
<script type="text/javascript">

      tinyMCE.init({
        mode : "textareas",
        theme : "advanced"  //(n.b. no trailing comma, this will be critical as you experiment later)
      });
      </script>

  </body>
</html>

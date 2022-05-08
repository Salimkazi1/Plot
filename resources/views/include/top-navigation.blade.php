<header class="main-header">
	<!-- Logo -->
	<a href="{{URL("/")}}" class="logo">
	  <!-- mini logo for sidebar mini 50x50 pixels -->
	  <span class="logo-mini"><b>PK</b></span>
	  <!-- logo for regular state and mobile devices -->
	  <span class="logo-lg"><b>PARKING</b></span>
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
	  <!-- Sidebar toggle button-->
	  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </a>
	  <div class="navbar-custom-menu">
		<ul class="nav navbar-nav">
		  <!-- User Account: style can be found in dropdown.less -->
		  <li class="dropdown user user-menu">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			  <img src="{!! URL::asset('dist/img/user.png') !!}" class="user-image" alt="User Image">
			  <span class="hidden-xs">{{Session::get("SuserName")}}</span>
			</a>
			<ul class="dropdown-menu">
			  <!-- User image -->
			  <li class="user-header">
				<img src="{!! URL::asset('dist/img/user.png') !!}" class="img-circle" alt="User Image">
				<p>{{Session::get("SuserName")}}</p>
			  </li>
			  <!-- Menu Body -->
			
			  <!-- Menu Footer-->
			  <li class="user-footer">
				<div class="pull-left">
				  {{--<a href="#" class="btn btn-default btn-flat">Profile</a>--}}
				</div>
				<div class="pull-right">
					{!! Form::open(['method'=>'POST','action' => ['AuthentificationController@logout']]) !!}
				  	<button type="submit" class="btn btn-default btn-flat">Déconnexion</button>
					{!! Form::close() !!}
				</div>
			  </li>
			</ul>
		  </li>
		  
		</ul>
	  </div>
	</nav>
</header>
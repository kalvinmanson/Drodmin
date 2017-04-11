<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Drodmin - @yield('title')</title>
	<meta name="keywords" content="@yield('meta-keywords')">
    <meta name="description" content="@yield('meta-keywords')">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/jquery.fancybox.css') !!}
    {!! Html::style('css/font-awesome.min.css') !!}
    {!! Html::style('css/animations.css') !!}
    {!! Html::style('css/admin.css') !!}
    {!! Html::script('editor/ckeditor.js') !!}
    
</head>
<body>
	<header>
		<div class="container">
			<ul class="nav navbar-nav navbar-inverse">
				<li><a href="/">Drodmin v4</a>
				<li><a href="{{ url('admin/pages') }}">Pages</a></li>
				<li><a href="{{ url('admin/categories') }}">Cetegories</a></li>
				<li><a href="{{ url('admin/menus') }}">Menús</a></li>
				<li><a href="{{ url('admin/users') }}">Users</a></li>
				<li><a href="{{ url('admin/countries') }}">Countries</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{ url('auth/logout') }}"><i class="fa fa-power-off"></i></a></li>
			</ul>
		</div>

	</header>
		<div class="container">
			@include('flash::message')
     		@include('partials.errors')
			@yield('content')
		</div>
	<footer>
		<div class="container">
			<p>&copy; 2017 By Droni.co</p>
		</div>
	</footer>

	{!! Html::script('js/jquery.min.js') !!}
	{!! Html::script('js/bootstrap.min.js') !!}
	{!! Html::script('js/bootstrap3-typeahead.min.js') !!}
	{!! Html::script('js/css3-animate-it.js') !!}
	{!! Html::script('js/jquery.fancybox.pack.js') !!}
	{!! Html::script('js/main.js') !!}
</body>
</html>
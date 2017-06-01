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
    {!! Html::style('css/app.css') !!}
    
</head>
<body>
	<header>
		<div class="container">
			<p align="center"><a href="/"><img src="http://droni.co/img/logo-dronico.png"></a></p>
			@include('partials.menu', ['menu_id' => 1])
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
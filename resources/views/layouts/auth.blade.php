<!DOCTYPE html>
<html>
<head>
	<title>Drodmin</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/font-awesome.min.css') !!}
    
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
			<h1>Drodmin V3</h1>
			@include('flash::message')
     		@include('partials.errors')
			@yield('content')
			</div>
		</div>
	</div>

	{!! Html::script('js/jquery.min.js') !!}
	{!! Html::script('js/bootstrap.min.js') !!}
	{!! Html::script('js/main.js') !!}
</body>
</html>
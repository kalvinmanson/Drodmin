@extends('layouts.admin')

@section('content')

<nav class="navbar navbar-default">
  <div class="container-fluid">
  	<a class="navbar-brand" href="{{ route('admin.countries.index') }}">Countries</a>
    <ul class="nav navbar-nav navbar-right">
	  <li><a href="#add_form" class="fancyb"><i class="fa fa-plus"></i> New</a></li>
	</ul>
  </div>
</nav>

<table class="table table-striped">
	<tr>
		<th width="20">ID</th>
		<th>Name</th>
		<th width="150">TimeStamps</th>
	</tr>
	@foreach ($countries as $country)
	<tr>
		<td>{{ $country->id }}</td>
		<td>
			<a href="{{ route('admin.countries.edit', $country->id) }}">{{ $country->name }} ({{ $country->code }}) </a><br />
			<small><a href="http://{{ $country->domain }}" target="_blank">{{ $country->domain }}</a></small>
		</td>
		<td>{{ $country->created_at }}<br>
		{{ $country->updated_at }}<br>
		</td>

	</tr>
	@endforeach
</table>
{!! $countries->render() !!}


<div class="add_form" id="add_form" style="display: none;">
	<form method="POST" action="{{ url('admin/countries') }}">
		<div class="form-group">
			<label for="name">Name</label>
			<input name="name" type="text" class="form-control input-lg" value="{{ old('name') }}">	
		</div>
		<div class="form-group">
			<input name="code" type="text" class="form-control input-xs" value="{{ old('code') }}">	
		</div>
		<div class="form-group">
			<label for="domain">Domain</label>
			<input name="domain" type="text" class="form-control" value="{{ old('domain') }}">	
		</div>
		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
		<button type="submit" class="btn btn-primary">Save</button>
	</form>
</div>



@endsection
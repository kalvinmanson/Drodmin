@extends('layouts.admin')

@section('content')

<h1>Edit country</h1>
<form method="POST" action="{{ url('admin/countries/'.$country->id) }}">
	<div class="form-group">
		<label for="name">Name</label>
		<input name="name" type="text" class="form-control input-lg" value="{{ old('name') ? old('name') : $country->name }}">	
	</div>
	<div class="form-group">
		<input name="code" type="text" class="form-control input-sm" value="{{ old('code') ? old('code') : $country->code }}">	
	</div>
	<div class="form-group">
		<label for="domain">Domain</label>
		<input name="domain" type="text" class="form-control" value="{{ old('domain') ? old('domain') : $country->domain }}">	
	</div>
	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
	<input name="_method" type="hidden" value="PUT">
	<button type="submit" class="btn btn-primary">Save</button>
</form>
<hr />
{!! Form::open([
    'method' => 'DELETE',
    'route' => ['admin.countries.destroy', $country->id]
]) !!}
    {!! Form::submit('Delete this?', ['class' => 'btn btn-danger pull-right']) !!}
{!! Form::close() !!}
@endsection
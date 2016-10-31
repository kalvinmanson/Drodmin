@extends('layouts.admin')

@section('content')
<a href="#add_form" class="fancyb btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> New</a>
<h1>Menus</h1>
<table class="table table-striped">
	<tr>
		<th width="20">ID</th>
		<th>Name</th>
		<th width="30">Links</th>
		<th width="150">TimeStamps</th>
	</tr>
	@foreach ($menus as $menu)
	<tr>
		<td>{{ $menu->id }}</td>
		<td>
			<a href="{{ route('admin.menus.edit', $menu->id) }}">{{ $menu->name }} </a>			
		</td>
		<td>{{ $menu->links->count() }}</td>
		<td>{{ $menu->created_at }}<br>
		{{ \Carbon\Carbon::createFromTimeStamp(strtotime($menu->created_at))->diffForHumans() }}
		</td>

	</tr>
	@endforeach
</table>
{!! $menus->render() !!}


<div class="add_form" id="add_form" style="display: none;">
	<form method="POST" action="{{ url('admin/menus') }}">

		@include('partials.errors')


		<div class="form-group">
			<label for="name">Nombre</label>
			<input name="name" type="text" class="form-control input-lg" value="{{ old('name') }}">	
		</div>
		<input type="hidden" name="category_id" value="1">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
		<button type="submit" class="btn btn-primary">Save</button>
	</form>
</div>

@endsection
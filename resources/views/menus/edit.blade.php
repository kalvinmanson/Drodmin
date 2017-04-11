@extends('layouts.admin')

@section('content')

<h1>Edit Menu</h1>
<div class="row">
	<div class="col-sm-8">
		<form method="POST" action="{{ url('admin/menus/' . $menu->id) }}">

			@include('partials.errors')


			<div class="form-group">
				<label for="name">Nombre</label>
				<input name="name" type="text" class="form-control input-lg" value="{{ old('name') ? old('name') : $menu->name }}">	
			</div>
			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
			<input type="hidden" name="_method" value="PUT" id="token">
			<button type="submit" class="btn btn-primary">Save</button>
		</form>
		
	<ul class="list-group">
		@foreach ($linksl1 as $link)
		<li class="list-group-item">
			{!! Form::open([
			    'method' => 'DELETE',
			    'route' => ['admin.links.destroy', $link->id]
			]) !!}
				<div class="btn-group pull-right">
					<a href="/admin/links/{{ $link->id }}/edit" class="btn btn-xs btn-warning fancya"><i class="fa fa-edit"></i></a>
			    	<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></button>
			    </div>
			{!! Form::close() !!}

			<span class="badge">country: {{ $link->country }}</span>
			{{ $link->orden }}: {{ $link->name }} <br />
			<small>{{ $link->link }}</small>
			<ul>
			@foreach ($link->children as $linkl2)
				<li class="list-group-item">

					{!! Form::open([
					    'method' => 'DELETE',
					    'route' => ['admin.links.destroy', $linkl2->id]
					]) !!}
						<div class="btn-group pull-right">
							<a href="/admin/links/{{ $linkl2->id }}/edit" class="btn btn-xs btn-warning fancya"><i class="fa fa-edit"></i></a>
					    	<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></button>
					    </div>
					{!! Form::close() !!}

					<span class="badge">country: {{ $linkl2->country }}</span>
					{{ $linkl2->orden }}: {{ $linkl2->name }} <br />
					<small>{{ $linkl2->link }}</small>
				</li>
			@endforeach
			</ul>
		</li>
		@endforeach
	</ul>
	</div>
	<div class="col-sm-4">
		<div class="panel panel-default">
		  <div class="panel-heading">New link</div>
		  <div class="panel-body">
		  	<form method="POST" action="{{ url('admin/links') }}">

			    <div class="form-group">
			    	<label form="parent_id">Parent</label>
			    	<select name="parent_id" id="parent_id" class="form-control">
			    		<option value="0">No one</option>
			    		@foreach ($linksl1 as $link)
			    			<option value="{{ $link->id }}">{{ $link->name }}
			    		@endforeach
			    	</select>
			    </div>
			    <div class="form-group">
			    	<label form="name">Name</label>
			    	<input type="text" name="name" id="name" class="form-control" autocomplete="off">
			    </div>
			    <div class="form-group">
			    	<label form="link">Link</label>
			    	<input type="text" name="link" id="link" class="form-control" autocomplete="off" value="#">
			    </div>

			    <div class="form-group">
			    	<label form="orden">Order</label>
			    	<input type="number" name="orden" id="orden" class="form-control" autocomplete="off" value="0">
			    </div>

				<div class="form-group">
					<label for="country">Country</label>
					<select name="country" id="country" class="form-control">
						<option value="all">All</option>
						<option value="co">Colombia</option>
						<option value="cl">Chile</option>
						<option value="mx">Mexico</option>
					</select>
				</div>
			    <div class="form-group">
					<input type="hidden" name="menu_id" value="{{ $menu->id }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
			    	<button type="submit" class="btn btn-primary">Save</button>
			    </div>
			</form>
		  </div>
		</div>
	</div>
</div>
{!! Form::open([
    'method' => 'DELETE',
    'route' => ['admin.menus.destroy', $menu->id]
]) !!}
    {!! Form::submit('Delete this?', ['class' => 'btn btn-danger pull-right']) !!}
{!! Form::close() !!}
@endsection
@extends('layouts.admin')

@section('content')

<nav class="navbar navbar-default">
  <div class="container-fluid">
  	<a class="navbar-brand" href="{{ route('admin.pages.index') }}">Pages</a>
    <ul class="nav navbar-nav navbar-right">
	  <li><a href="#add_form" class="fancyb"><i class="fa fa-plus"></i> New</a></li>
	</ul>
	<form class="navbar-form navbar-right" role="search" action="" method="GET">
		<div class="form-group">
			<select name="q_category" class="form-control">
				<option value="all">All Categories</option>
				@foreach ($categories as $category)
				<option value="{{ $category->id }}" {{ $category->id == $q_category ? 'selected' : '' }}>{{ $category->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<select name="q_country" class="form-control">
				<option value="all">All Countries</option>
				@foreach ($countries as $country)
				<option value="{{ $country->id }}" {{ $country->id == $q_country ? 'selected' : '' }}>{{ $country->name. " (" .$country->domain. ")" }}</option>
				@endforeach
			</select>
		</div>
	  <div class="input-group">
	    <input name="q" id="q" type="text" class="form-control" placeholder="Search for..." value="{{ $q }}">
	    <span class="input-group-btn">
	  	  <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
	    </span>
	  </div><!-- /input-group -->
	  {{ csrf_field() }}
	</form>
  </div>
</nav>

<table class="table table-striped">
	<tr>
		<th width="20">ID</th>
		<th>Name</th>
		<th width="150">Category</th>
		<th width="30">Country</th>
		<th width="250">TimeStamps</th>
	</tr>
	@foreach ($pages as $page)
	<tr>
		<td>{{ $page->id }}</td>
		<td>
			<a href="{{ route('admin.pages.edit', $page->id) }}">{{ $page->name }} </a><br />
			<small><a href="/{{ $page->category->slug }}/{{ $page->slug }}" target="_blank">/{{ $page->category->slug }}/{{ $page->slug }}</a></small>
			
		</td>
		<td>{{ $page->category ? $page->category->name : "None" }} </td>
		<td>{{ $page->country ? $page->country->name : "None" }}</td>
		<td>
			<small>
				Created at: {{ $page->created_at }}<br />
				Updated at: {{ $page->updated_at }}
			</small>
		</td>

	</tr>
	@endforeach
</table>
{!! $pages->render() !!}


<div class="add_form" id="add_form" style="display: none;">
	<form method="POST" action="{{ url('admin/pages') }}">
		<div class="form-group">
			<label for="name">Nombre</label>
			<input name="name" type="text" class="form-control input-lg" value="{{ old('name') }}">	
		</div>
		<div class="form-group">
			<input name="slug" type="text" class="form-control input-xd" value="{{ old('slug') ? old('slug') : rand(1000000,9999999) }}">	
		</div>
		<input type="hidden" name="category_id" value="1">
		{{ csrf_field() }}
		<button type="submit" class="btn btn-primary">Save</button>
	</form>
</div>

@endsection
<form method="POST" action="{{ url('admin/links/' . $link->id) }}">

	@include('partials.errors')

	{{ csrf_field() }}

	<div class="form-group">
		<label for="name">Name</label>
		<input name="name" type="text" class="form-control input-lg" value="{{ old('name') ? old('name') : $link->name }}">	
	</div>
	<div class="form-group">
		<label for="link">Link</label>
		<input name="link" type="link" class="form-control" value="{{ old('link') ? old('link') : $link->link }}">	
	</div>
	<div class="form-group">
		<label for="orden">Order</label>
		<input name="orden" type="number" class="form-control" value="{{ old('orden') ? old('orden') : $link->orden }}">	
	</div>
	<div class="form-group">
		<label for="country_id">Country</label>
		<select name="country_id" id="country_id" class="form-control">
			@foreach ($countries as $country)
			<option value="{{ $country->id }}" {{ $country->id == $link->country_id ? 'selected' : '' }}>{{ $country->name. " (" .$country->domain. ")" }}</option>
			@endforeach
		</select>
	</div>
	<input type="hidden" name="_method" value="PUT">
	<button type="submit" class="btn btn-primary">Save</button>
</form>
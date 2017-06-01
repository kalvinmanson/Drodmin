@extends('layouts.auth')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading"><h4>Reset Password</h4></div>
    <div class="panel-body">
        <form method="POST" action="/password/email">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
            </div>
        </form>
    </div>
</div>
@endsection
@extends('layouts.blank')

@section('content')
<div class="container-fluid">
  <attachments :attachments="{{ $attachments }}"></attachments>
</div>


@endsection

@extends('layouts.app')

@section('content')

@if($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<form method="post" action="{{ route('upload_image') }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" accept="image/png, image/jpeg">
    <br>
    <input type="submit" value="Upload">
</form>
@endsection

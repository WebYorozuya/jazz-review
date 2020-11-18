@extends('layouts.settings')

@section('css')
<link rel="stylesheet" href="{{asset('css/mypage.css')}}">
@endsection

@section('header')
  @component('components.header')
  @endcomponent
@endsection

@section('main')

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

@foreach($user_images as $user_image)
  <img class='image-round1' src="{{ Auth::user()->user_image }}">
  <br>
@endforeach
@endsection
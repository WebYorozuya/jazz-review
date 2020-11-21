@extends('layouts.settings')

@section('css')
  @env('local')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
  @endenv
  @production
    <link rel="stylesheet" href="{{ secure_asset('css/mypage.css') }}">
  @endproduction
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
    <h1>プロフィール画像を設定する</h1>
    <form method="post" action="{{ route('upload_image') }}" enctype="multipart/form-data">
      @csrf
      <input type="file" name="image" accept="image/png, image/jpeg">
      <input type="submit" value="Upload">
    </form>
  @foreach($user_images as $user_image)
    <img class='image-round1' src="{{ Auth::user()->user_image }}">
  @endforeach
@endsection


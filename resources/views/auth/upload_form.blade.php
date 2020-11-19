@extends('layouts.settings')

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
    <br>
    <input type="submit" value="Upload">
  </form>
@endsection
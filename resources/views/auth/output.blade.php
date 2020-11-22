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
  <div class="user-img">プロフィール画像を設定</div>
  <div class="profile-img">
    @foreach($user_images as $user_image)
      <img class='image-round1' src="{{ Auth::user()->user_image }}">
      <br>
    @endforeach
    <form method="post" action="{{ route('upload_image') }}" enctype="multipart/form-data" class="upload-image"> 
      @csrf
      <input type="file" class="image" name="image" accept="image/png, image/jpeg">
      <input type="submit" class="img-upload" value="写真をアップロード">
    </form>
  </div><!-- profile-img -->

  <!--**********自己紹介文（仮）エリア **********-->
  <div class="user-introduction">
    <form action="process" accept-charset="UTF-8" method="post" class="main-form">
      @csrf
      <label class="introduction" for="introduction">自己紹介文</label>
      <textarea name="text" id="introduction" cols="40" rows="8" maxlength="1000" required></textarea>
  </div>
  <div class="settings-btn">
    <input type="submit" class="settings" value="設定する">
  </div>
  </form>
  </div>
@endsection

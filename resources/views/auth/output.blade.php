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
<div class="user-img">プロフィール画像を設定</div>
<div class="profile-img">
  @foreach($user_images as $user_image)
  <img class='image-round1' src="{{ asset('../storage/uploads/' . $user_image['user_image']) }}">
  <br>
  @endforeach

  <form method="post" action="{{ route('upload_image') }}" enctype="multipart/form-data">
    @csrf
    <input type="file" class="img-file" name="image" accept="image/png, image/jpeg">
    <input type="submit" class="img-upload" value="写真をアップロード">
  </form>
</div>

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
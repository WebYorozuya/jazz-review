@extends('layouts.ourapp')

@section('title', '投稿する')

@section('css')
  <!-- Heroku -->
  <link rel="stylesheet" href="{{secure_asset('css/post.css')}}">
  <!-- Local -->
  <link rel="stylesheet" href="{{asset('css/post.css')}}">
@endsection

@component('components.header')
  @slot('user')
    @if (Route::has('login'))
    @auth
      {{$user->account_name}}
    @else
      {{$user = 'ゲスト'}}
    @endauth
    @endif
  @endslot
@endcomponent

@section('main')
<h1 class="main-title">レビューを投稿する</h1>
<div class="form_container">
    <form action="insert" id="create-account" method="POST">
    @csrf
    @if (Route::has('login'))
        @auth
        <h1>{{$user->account_name}}さん、<br>あなたの体験をシェアしましょう</h1>
        <input type="hidden" name="user_id" value="{{$user->id}}">
    @else
        <h1>{{$user}}さん、<br>あなたの体験をシェアしましょう</h1>
        <input type="hidden" name="user_id" value="2">
        @endauth
    @endif
        <label for="live_date">ライブに行った日</label>
        <input type="date" id="live_date" name="live_date">

        <label for="tag">タグ</label>
        <div class="chips chips-initial">
        <input type="text" id="tag" name="tag_name" placeholder="Enter a tag">
        </div>
        
        <label for="title">レビューのタイトル</label>
        <input type="text" id="title" name="title">
        <label for="text">ライブの感想</label>
        <textarea name="text" id="text" cols="30" rows="10"></textarea>
        <p style="text-align: right; font-size: 0.8rem;">現在：<span id="realtimeFontLength">0</span>文字（XXXX文字以内）</p>
        <input type="button" class="submit" onclick="submit();" value="投稿する">
        <button>リセットする</button>
      </form>  
  </div><!-- /.form_container -->
@endsection

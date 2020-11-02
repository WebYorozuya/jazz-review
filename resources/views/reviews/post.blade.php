@extends('layouts.public')

@section('title', '投稿する')

@section('css')
  <!-- Heroku -->
  <link rel="stylesheet" href="{{secure_asset('css/post.css')}}">
  <!-- Local -->
  <link rel="stylesheet" href="{{asset('css/post.css')}}">
@endsection

@section('header')
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
@endsection

@section('main')
  <h1 class="main-title">レビューを投稿する</h1>
  <div class="form_container">
    <form action="insert" id="create-post" method="POST">
      @csrf
      @auth
        <h1>{{$user->account_name}}さん、<br>あなたの体験をシェアしましょう</h1>
        <input type="hidden" name="user_id" value="{{$user->id}}">
      @endauth
      @guest
        <h1>{{$user}}さん、<br>あなたの体験をシェアしましょう</h1>
        <input type="hidden" name="user_id" value="2">
      @endguest
      <label for="live_date">ライブに行った日</label>
      <input type="date" id="live_date" name="live_date">
      <label for="tag">タグ</label>
      <div class="chips chips-initial">
        <input type="text" id="tag" placeholder="Enter a tag">
      </div>
      <input type="text" id="hiddentag" name="tag_name" hidden>
      <label for="title">レビューのタイトル</label>
      <input type="text" id="title" name="title">
      <label for="text">ライブの感想</label>
      <textarea name="text" id="text" cols="30" rows="10" maxlength="1000"></textarea>
      <p style="text-align: right; font-size: 0.8rem;">現在：<span id="realtimeFontLength">0</span>文字（1000文字以内）</p>
      <input type="button" id="post-button" value="投稿する">
      <button>リセットする</button>
    </form>  
  </div><!-- /.form_container -->
@endsection

@section('js')
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  @env('local')
    <script type="text/javascript" src="{{ asset('js/chips.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/live_date.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/character_counter.js') }}"></script>
  @endenv
  @production
    <script type="text/javascript" src="{{ secure_asset('js/chips.js') }}"></script>
    <script type="text/javascript" src="{{ secure_asset('js/live_date.js') }}"></script>
    <script type="text/javascript" src="{{ secure_asset('js/character_counter.js') }}"></script>
  @endproduction
@endsection

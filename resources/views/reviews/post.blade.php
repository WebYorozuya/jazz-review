@extends('layouts.public')

@section('title', '投稿する')

@section('css')
@env('local')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/ourmaterialize.css') }}"  media="screen,projection"/>
    <link rel="stylesheet" href="{{asset('css/post.css')}}">
  @endenv
  @production
    <link type="text/css" rel="stylesheet" href="{{ secure_asset('css/ourmaterialize.css') }}"  media="screen,projection"/>
    <link rel="stylesheet" href="{{secure_asset('css/post.css')}}">
  @endproduction
@endsection

@section('header')
  @component('components.header')
  @endcomponent
@endsection

@section('main')
  <h1 class="main-title">レビューを投稿する</h1>
  <div class="form_container">
    <form action="insert" id="create-post" method="POST">
      @csrf
      @auth
        <h1>{{Auth::user()->account_name}}さん、<br>あなたの体験をシェアしましょう</h1>
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
      @endauth
      @guest
        <h1>ゲストさん、<br>あなたの体験をシェアしましょう</h1>
        <input type="hidden" name="user_id" value="2">
      @endguest
      <label for="live_date">ライブに行った日</label>
      <input type="date" id="live_date" class="live_date" name="live_date" value="{{old('live_date')}}">
      <label for="tag">タグ</label>
      <div id="tags-parent" class="suggested-tags-parent">
        <input id="tag" class="tag-input" type="text" placeholder="タグを入力して候補から選択" autocomplete="off">
        <div id="tag-error-msg" class="tag-error-msg" style="display: none;">入力されたタグが存在しません</div>
        <ul id="suggested-tags" class="suggested-tags" style="display: none;"></ul>
        <div id="suggested-tags-bg" class="suggested-tags-bg" style="display: none;"></div>
      </div>
      <input type="text" id="hidden-tag" name="tag_name" hidden>
      <label for="title">レビューのタイトル</label>
      <input type="text" id="title" name="title"  maxlength="80"  value="{{old('title')}}">
      <p class="max-length">（80文字以内）</p>
      <label for="text">ライブの感想</label>
      <textarea name="text" id="text" cols="30" rows="10" maxlength="1000">{{old('text')}}</textarea>
      <p  class="max-length">現在：<span id="realtimeFontLength">0</span>文字（1000文字以内）</p>
      @if (count($errors) > 0)
        <div class="error-messages">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div><!-- .error-messages -->
      @endif
      <input type="button" id="post-button" value="投稿する">
    </form>
  </div><!-- /.form_container -->
@endsection

@section('js')
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  @env('local')
    <script type="text/javascript" src="{{ asset('js/live_date.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/character_counter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/suggest_tag.js') }}"></script>
  @endenv
  @production
    <script type="text/javascript" src="{{ secure_asset('js/live_date.js') }}"></script>
    <script type="text/javascript" src="{{ secure_asset('js/character_counter.js') }}"></script>
    <script type="text/javascript" src="{{ secure_asset('js/suggest_tag.js') }}"></script>
  @endproduction
@endsection

@extends('layouts.public')

@section('title', '投稿を修正する')

@section('css')
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
  <h1 class="main-title">レビューを修正／削除する</h1>
  <div class="form-container">
    <form action="update" id="create-post" method="POST">
      @csrf
      <h1>投稿を修正する</h1>
      <input type="hidden" name="user_id" value="{{$review->user_id}}">
      <input type="hidden" name="id" value="{{$review->id}}">
      <label for="live-date">ライブに行った日</label>
      <input type="date" id="live-date" class="live-date" name="live_date" value="{{$review->live_date}}">
      <label for="tag">タグ</label>
      <div id="tags-parent" class="suggested-tags-parent">
        @foreach ($review->tags as $tag)
        <span class="chip">{{$tag->tag_name}}</span>
        @endforeach
        <input id="tag" class="tag-input" type="text" placeholder="タグを入力して候補から選択" autocomplete="off">
        <div id="tag-error-msg" class="tag-error-msg" style="display: none;">入力されたタグが存在しません</div>
        <ul id="suggested-tags" class="suggested-tags" style="display: none;"></ul>
        <div id="suggested-tags-bg" class="suggested-tags-bg" style="display: none;"></div>
      </div>
      <input type="text" id="hidden-tag" name="tag_name" hidden>
      <label for="title">レビューのタイトル</label>
      <input type="text" id="title" name="title" value="{{$review->title}}" maxlength="80">
      <p class="max-length">（80文字以内）</p>
      <label for="text">ライブの感想</label>
      <textarea name="text" id="text" cols="30" rows="10" maxlength="1000">{{$review->text}}</textarea>
      <p style="text-align: right; font-size: 0.8rem;">（1000文字以内）</p>
      @if (count($errors) > 0)
        <div class="error-messages">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div><!-- .error-messages -->
      @endif
      <input type="button" id="post-button" class="submit" value="修正">
    </form>
    <form action="del" method="post">
      @csrf
      <input type="hidden" name="id" value="{{$review->id}}">
      <input type="submit" class="submit" id="del" value="削除">
    </form>
  </div><!-- /.form_container -->
@endsection

@section('js')
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  @env('local')
    <script type="text/javascript" src="{{ asset('js/chips.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/character_counter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/layout_tag.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/suggest_tag.js') }}"></script>
  @endenv
  @production
    <script type="text/javascript" src="{{ secure_asset('js/chips.js') }}"></script>
    <script type="text/javascript" src="{{ secure_asset('js/character_counter.js') }}"></script>
    <script type="text/javascript" src="{{ secure_asset('js/layout_tag.js') }}"></script>
    <script type="text/javascript" src="{{ secure_asset('js/suggest_tag.js') }}"></script>
  @endproduction
@endsection

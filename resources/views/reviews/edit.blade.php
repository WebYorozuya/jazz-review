@extends('layouts.ourapp')

@section('title', '投稿を修正する')

@section('css')
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css Heroku-->
  <link type="text/css" rel="stylesheet" href="{{ secure_asset('css/ourmaterialize.css') }}"  media="screen,projection"/>
  <!--Import materialize.css Local-->
  <link type="text/css" rel="stylesheet" href="{{ asset('css/ourmaterialize.css') }}"  media="screen,projection"/>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
        @endif
      @endauth
    @endslot
  @endcomponent
@endsection

@section('main')
<h1 class="main-title">レビューを修正／削除する</h1>
<div class="form_container">
    <form action="update" id="create-account" method="POST">
    @csrf
        <h1>投稿を修正する</h1>
        <input type="hidden" name="user_id" value="{{$review->user_id}}">
        <input type="hidden" name="id" value="{{$review->id}}">
        <label for="live_date">ライブに行った日</label>
        <input type="date" id="live_date" name="live_date" value="{{$review->live_date}}">
        <label for="tag">タグ</label>
        <input type="text" id="tag" name="tag_name" value="@foreach ($review->tags as $tag){{$tag->tag_name}} @endforeach">
        <label for="title">レビューのタイトル</label>
        <input type="text" id="title" name="title" value="{{$review->title}}">
        <label for="text">ライブの感想</label>
        <textarea name="text" id="text" cols="30" rows="10">{{$review->text}}</textarea>
        <p style="text-align: right; font-size: 0.8rem;">（XXXX文字以内）</p>
        <input type="submit" id="post-button" class="submit" value="修正">
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
  <script type="text/javascript" src="{{ secure_asset('js/chips.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/chips.js') }}"></script>
  <script type="text/javascript" src="{{ secure_asset('js/character_counter.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/character_counter.js') }}"></script>
@endsection

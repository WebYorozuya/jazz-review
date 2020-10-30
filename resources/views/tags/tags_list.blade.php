@extends('layouts.ourapp')

@section('title', '投稿のタグ一覧')

@section('css')
  <!-- Heroku -->
  <link rel="stylesheet" href="{{secure_asset('css/tags.css')}}">
  <!-- Local -->
  <link rel="stylesheet" href="{{asset('css/tags.css')}}">
@endsection

@section('header')
  @component('components.header')
    @slot('user')
      {{$user}}
    @endslot
  @endcomponent
@endsection

@section('main')
<h1 class="main-title">タグ一覧</h1>
  <div class="tags-global-container">
    <p>Jazz Logに登録されているタグの一覧です。<br>気になるタグをクリックしてみましょう。</p>
    <div class="tags-container">
      @foreach($items as $item)
      <div class="tag-box">
        <a class="tag-label" href="#" data-count="{{ $item->reviews_count }}">
          <span>{{$item->tag_name}}</span>
        </a>
      </div>
      @endforeach
    </div><!-- main-list -->
  </div><!-- tag-home -->
@endsection

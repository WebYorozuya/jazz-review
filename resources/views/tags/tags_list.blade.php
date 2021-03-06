@extends('layouts.public')

@section('title', '投稿のタグ一覧')

@section('css')
  @env('local')
    <link rel="stylesheet" href="{{ asset('css/tags.css') }}">
  @endenv
  @production
    <link rel="stylesheet" href="{{ secure_asset('css/tags.css') }}">
  @endproduction
@endsection

@section('header')
  @component('components.header')
  @endcomponent
@endsection

@section('main')
  <h1 class="main-title">タグ一覧</h1>
  <div class="tags-global-container">
    <p>Jazz Logに登録されているタグの一覧です。<br>気になるタグをクリックしてみましょう。</p>
    <div class="tags-container">
      @foreach($tags as $tag)
        <div class="tag-box">
          <a class="tag-label" href="{{ route('tags.tag', ['tag_name' => $tag->tag_name]) }}" data-count="{{ $tag->reviews_count }}">
            <span>{{$tag->tag_name}}</span>
          </a>
        </div>
      @endforeach
    </div><!-- main-list -->
  </div><!-- tag-home -->
@endsection

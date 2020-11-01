@extends('layouts.public')

@section('title', 'Jazz Log')

@section('header')
  @component('components.header')
    @slot('user')
      {{$user}}
    @endslot
  @endcomponent
@endsection

@section('main')
  <h1 class="main-title">新着レビュー</h1>
  @include('components.review_component')
@endsection

@section('js')
  @env('local')
  <script type="text/javascript" src="{{ asset('js/review_dd.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/review_text_height_change.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/like.js') }}"></script>
  @guest
  <script type="text/javascript" src="{{ asset('js/like_warning.js') }}"></script>
  @endguest
  @endenv
  @production
  <script type="text/javascript" src="{{ secure_asset('js/review_dd.js') }}"></script>
  <script type="text/javascript" src="{{ secure_asset('js/review_text_height_change.js') }}"></script>
  <script type="text/javascript" src="{{ secure_asset('js/like.js') }}"></script>
  @endproduction
  @guest
  <script type="text/javascript" src="{{ secure_asset('js/like_warning.js') }}"></script>
  @endguest
@endsection

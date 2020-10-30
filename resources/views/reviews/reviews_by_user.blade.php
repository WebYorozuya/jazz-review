@extends('layouts.ourapp')

@section('css')
<link rel="stylesheet" href="{{asset('css/reviews_by_user.css')}}">
@endsection

@section('title', 'ユーザー別投稿')

@section('header')
  @component('components.header')
    @slot('user')
    {{$user}}
    @endslot
  @endcomponent
@endsection

@section('main')
  <h1 class="main-title">{{$account_name}}さん</h1>
  <div class="user-info-container">
    <div class="user-info-left">
      <ul class="user-sns-btn">
        <li class="twitter-btn">
          <a href="#">
            <i class="fab fa-twitter-square fa-lg"></i></a>
        </li>
        <li class="facebook-btn">
          <a href="#">
            <i class="fab facebook-square fa-facebook-square fa-lg"></i></a>
        </li>
      </ul>
    </div><!-- /.tag-info-left -->
    <div class="user-info-right">
    </div><!-- /.user-info-right -->
  </div><!-- /.user-info-container -->
  @include('components.review_component')
@endsection

@section('js')
  @env('local')
    <script type="text/javascript" src="{{ asset('js/review_dd.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/review_text_height_change.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/like.js') }}"></script>
  @endenv
  @production
    <script type="text/javascript" src="{{ secure_asset('js/review_dd.js') }}"></script>
    <script type="text/javascript" src="{{ secure_asset('js/review_text_height_change.js') }}"></script>
    <script type="text/javascript" src="{{ secure_asset('js/like.js') }}"></script>
  @endproduction
@endsection
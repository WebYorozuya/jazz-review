@extends('layouts.public')

@section('css')
  @env('local')
   <link rel="stylesheet" href="{{ asset('css/reviews_by_user.css') }}">
  @endenv
  @production
    <link rel="stylesheet" href="{{ secure_asset('css/reviews_by_user.css') }}">
  @endproduction
@endsection

@section('title', 'ユーザー別投稿')

@section('header')
  @component('components.header')
  @endcomponent
@endsection

@section('main')
  <h1 class="main-title">{{ $selected_user->account_name }}さんの投稿</h1>
  <div class="user-info-container">
    <div class="user-info-left">
      @env('local')
        @if ($selected_user->user_image)
          <img src="{{ $selected_user->user_image }}" alt="">
        @else
          <img src="images/icons8-user-male-30-black.png" alt="">
        @endif
      @endenv
      @production
        <img src="images/icons8-user-male-30-black.png" alt="">
      @endproduction
      <ul class="user-sns-btn">
        <li class="twitter-btn">
          <a href="#">
            <i class="fab fa-twitter-square fa-lg"></i></a>
        </li>
        <li class="facebook-btn">
          <a href="#">
            <i class="fab facebook-square fa-facebook-square fa-lg"></i></a>
        </li>
        <li class="instagram-btn">
          <a href="#">
            <i class="fab fa-instagram-square fa-lg"></i></a>
        </li>
      </ul>
    </div><!-- /.tag-info-left -->
    <div class="user-info-right">
      <div class="user-introduction">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet harum nihil ullam porro libero quam eius doloremque numquam fugit accusantium, odio fugiat nam nulla? Voluptas rerum dolore impedit dolor alias.
      </div>
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

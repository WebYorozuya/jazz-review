@extends('layouts.ourapp')

@section('css')
<link rel="stylesheet" href="{{asset('css/reviews_by_tag.css')}}">
@endsection

@section('title', 'タグ別投稿')

@section('header')
  @component('components.header')
    @slot('user')
    {{$user}}
    @endslot
  @endcomponent
@endsection

@section('main')
  <h1 class="main-title">タグ「{{$tag_name}}」の投稿一覧</h1>
  <div class="tag-container">
    <div class="tag-info-left">
      <h2>{{$tag_name}}</h2>
      <ul>
        <li>
          <a class="hp-url" href="#">ホームページ</a>
        </li>
        <li>
          <a class="address" href="#">住所</a>
        </li>
      </ul>
    </div><!-- /.tag-info-left -->
    <div class="tag-info-right">
      <!-- google map埋め込み -->
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.827853398555!2d139.76493611539615!3d35.681240537578475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bfbd89f700b%3A0x277c49ba34ed38!2z5p2x5Lqs6aeF!5e0!3m2!1sja!2sjp!4v1575076167410!5m2!1sja!2sjp" width="100％" height="200" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div><!-- /.tag-info-right -->
  </div><!-- /.tag-container -->
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

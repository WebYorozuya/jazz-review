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
<h1 class="main-title">タグ{{$tag_name}}の投稿一覧</h1>
<div class="tag-container">
  <div class="tag-info-left">
    <h2>{{$tag_name}}</h2>
    <ul>
      <li>
        <a class="hp-url" href="http://">ホームページ</a>
      </li>
      <li>
        <a class="address" href="http://">住所</a>
      </li>
    </ul>
  </div><!-- /.tag-info-left -->
<div class="tag-info-right">
  <!-- google map埋め込み -->
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.827853398555!2d139.76493611539615!3d35.681240537578475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bfbd89f700b%3A0x277c49ba34ed38!2z5p2x5Lqs6aeF!5e0!3m2!1sja!2sjp!4v1575076167410!5m2!1sja!2sjp" width="100％" height="200" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</div><!-- /.tag-info-right -->
</div><!-- /.tag-container -->
@foreach ($items as $item)
<div class="review">
  <div class="review-left">
    <a href="user?user_id={{$item->user_id}}" class="user-image">
      <img src="images/icons8-user-male-30-black.png" alt="">
    </a>
  </div><!-- /.review-left -->
  <div class="review-right">
    <div class="review-top">
      <h2>{{$item->live_date}} {{$item->title}}</h2>
      <a href="modify?id={{$item->id}}" class="review-action">
        <i class="fas fa-ellipsis-h"></i>
      </a>
    </div><!-- /.review-right-top -->
    <div class="tags">
      @foreach ($item->tags as $tag)
      <a href="#" class="tag">{{$tag->tag_name}}</a>
      @endforeach
    </div>
    <p>{{$item->text}}</p>
    <div class="review-bottom">
      <span class="user-name">by <a href="user?user_id={{$item->user_id}}">{{$item->user->account_name}}さん</span></a>
      <span class="created-at">{{$item->created_at}}</span>
      <span class="likes">
        <i class="far fa-heart"></i>
        <span class="like-counter">00</span>
      </span>
    </div><!-- /.review-bottom -->
  </div><!-- /.review-right -->
</div><!-- /.main-newReview 1投稿のお尻 -->
@endforeach
{{ $items->links('vendor.pagination.bootstrap-4')}}
@endsection

@section('js')
<script type="text/javascript" src="{{ secure_asset('js/review_dd.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/review_dd.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('js/review_text_height_change.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/review_text_height_change.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('js/like_btn.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/like_btn.js') }}"></script>
@endsection
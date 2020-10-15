@extends('layouts.ourapp')

@section('title', '検索結果')

@component('components.header')
  @slot('user')
    {{$user}}
  @endslot
@endcomponent

@section('main')
<h1 class="main-title"><span>「{{$keyword}}」</span>の検索結果</h1>
@foreach ($reviews as $review)
  <div class="review">
    <div class="review-left">
      <a href="user?user_id={{$review->user_id}}" class="user-image">
        <img src="images/icons8-user-male-30-black.png" alt="user-image">
      </a>
    </div><!-- /.review-left -->
    <div class="review-right">
      <div class="review-top">
        <h2>{{$review->live_date}} {{$review->title}}</h2>
        <a href="modify?id={{$review->id}}" class="review-action">
          <i class="fas fa-ellipsis-h"></i>
        </a>
      </div><!-- /.review-right-top -->
      <div class="tags">
        @foreach ($review->tags as $tag)
        <a href="#" class="tag">{{$tag->tag_name}}</a>
        @endforeach
      </div>
      <p>{{$review->text}}</p>
      <div class="review-bottom">      
        <span class="user-name">by <a href="user?user_id={{$review->user_id}}">{{$review->user->account_name}}さん</span></a>
        <span class="created-at">{{$review->created_at}}</span>
        <span class="likes">
          <i class="far fa-heart"></i>
          <span class="like-counter">00</span>
        </span>
      </div><!-- /.review-bottom -->
    </div><!-- /.review-right -->
  </div><!-- /.main-newReview 1投稿のお尻 -->
  @endforeach
  {{ $reviews->links('vendor.pagination.bootstrap-4')}}
@endsection
@section('js')
@endsection

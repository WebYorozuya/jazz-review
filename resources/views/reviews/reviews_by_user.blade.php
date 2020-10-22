@extends('layouts.ourapp')

@section('title', 'ユーザー別投稿')

@component('components.header')
  @slot('user')
    {{$user}}
  @endslot
@endcomponent

@section('main')
<h1 class="main-title">{{$account_name}}さんの投稿</h1>
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
        <a href="edit?id={{$item->id}}" class="review-action">
          <i class="fas fa-ellipsis-h"></i>
        </a>
      </div><!-- /.review-right-top -->
      <div class="tags">
        @foreach ($item->tags as $tag)
        <a href="tag?id={{$tag->id}}" class="tag">{{$tag->tag_name}}</a>
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


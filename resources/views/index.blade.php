@extends('layouts.ourapp')

@section('title', 'Jazz Log')

<!-- @section('h1', '新着レビュー') -->

@section('main')
<h1 class="main-title">新着レビュー</h1>
@foreach ($items as $item)
        <div class="review">
          <div class="review-left">
            <a href="#" class="user-image">
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
              <a href="#" class="tag">jazz</a>
              <a href="#" class="tag">東京</a>
              <a href="#" class="tag">おしゃれ</a>
            </div>
            <p>{{$item->text}}</p>
            <div class="review-bottom">
              <span class="user-name">by {{$item->getData()}}さん</span>
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

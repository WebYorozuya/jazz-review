@extends('layouts.ourapp')

@section('title', 'Jazz Log')

@component('components.header')
  @slot('user')
    {{$user}}
  @endslot
@endcomponent

@section('main')
<h1 class="main-title">新着レビュー</h1>
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
        <!-- ドロップダウンメニュー -->
        <div class="review-dropdown-wrapper">
          <i class="fas fa-ellipsis-h showIcon"></i>
          <ul class="review-dropdown">
            <a href="edit?id={{ $item->id }}">
              <li>編集する</li>
            </a>
            <a href="contact#contact">
              <li>報告する</li>
            </a>
          </ul>
        </div><!-- /.review-menu-wrapper -->
        <!-- ドロップダウンメニューここまで -->
      </div><!-- /.review-top -->
      <div class="tags">
        @foreach ($item->tags as $tag)
        <a href="{{ route('tag', ['id' => $tag->id]) }}" class="tag">{{$tag->tag_name}}</a>
        @endforeach
      </div><!-- /.tags -->
      <p>{{$item->text}}</p>
      <div class="review-bottom">
        <span class="user-name">by <a href="user?user_id={{$item->user_id}}">{{$item->getData()}}さん</span></a>
        <span class="created-at">{{$item->created_at}}</span>
        <span class="likes">
          <i class="fas fa-heart"></i>
          <span class="like-counter">0</span>
        </span>
      </div><!-- /.review-bottom -->
    </div><!-- /.review-right -->
  </div><!-- /.review 1投稿のお尻 -->
  @endforeach
  {{ $items->links('vendor.pagination.bootstrap-4')}}
@endsection

@yield('js')
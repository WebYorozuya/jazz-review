@extends('layouts.ourapp')

@section('title')
「{{$keyword}}」の検索結果
@endsection

@section('header')
  @component('components.header')
    @slot('user')
      {{$user}}
    @endslot
  @endcomponent
@endsection

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
        <h2>{{$review->live_date}} <span class="search-review-text">{{$review->title}}</span></h2>
        <a href="modify?id={{$review->id}}" class="review-action">
          <i class="fas fa-ellipsis-h"></i>
        </a>
      </div><!-- /.review-right-top -->
      <div class="tags">
        @foreach ($review->tags as $tag)
        <!-- TODO:タグもハイライト出来るようにする -->
        <a href="#" class="tag">{{$tag->tag_name}}</a>
        @endforeach
      </div><!-- /.tags -->
      <p class="search-review-text review-text">{!! nl2br(e($review->text)) !!}</p>
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
  <script>
    // 検索ワードをハイライトする処理
    // TODO:平仮名とカタカナを区別しないでハイライト出来るようにする
    const keyword = '{{$keyword}}';
    const highlightedKeyword = '<span style="background-color:#FFFF00;">' + keyword + '</span>';

    let reviewHTMLs = Array.prototype.slice.call(document.getElementsByClassName('search-review-text'));
    reviewHTMLs.forEach((reviewHTML, i) => {
        let reviewText = reviewHTML.innerText;
        let highlightedReviewText = reviewText.replace(new RegExp(keyword, 'g'), highlightedKeyword);
        // 置換対象テキスト作成
        reviewText = reviewText.replace(/\n/g, '<br>');
        // 置換先テキスト作成
        highlightedReviewText = highlightedReviewText.replace(/\n/g, '<br>');
        // 置換できるように不要な改行コードを削除
        reviewHTML = reviewHTML.innerHTML.replace(/\n/g, '');
        // reviewHTMLに含まれている全ての置換対象テキストを置換先テキストに置換
        const highlightedReviewHTML = reviewHTML.replace(new RegExp(reviewText,'g'), highlightedReviewText);
        document.getElementsByClassName('search-review-text')[i].innerHTML = highlightedReviewHTML;
    });
  </script>
@endsection

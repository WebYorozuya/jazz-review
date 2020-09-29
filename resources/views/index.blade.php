@extends('layouts.ourapp')

@section('title', 'Jazz Log')

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
        <span class="user-name">by <a href="user?user_id={{$item->user_id}}">{{$item->getData()}}さん</span></a>
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
<script>
    //ボタンを押すことで開閉する機能
    let openCloseBtn = document.getElementsByClassName("main-newReviewOpenClose");

    function openClose(event) {
        const oI = document.getElementById("openImg");
        const cI = document.getElementById("closeImg");
        const checkbox = document.getElementById("openCloseCheckBox");
        const newReviewTextHeight = document.querySelector("#main-newReviewText");
        const textHeight = newReviewTextHeight.getBoundingClientRect().height;

        if (checkbox.checked == true) {
            checkbox.checked = false;
            oI.style.display = "block";
            cI.style.display = "none";
            newReviewTextHeight.style.height = (textHeight - 50) + "px";

        } else {
            checkbox.checked = true;
            oI.style.display = "none";
            cI.style.display = "block";
            newReviewTextHeight.style.height = (textHeight + 50) + "px";
        }
    }

    for (i = 0; i < openCloseBtn.length; i++) {
        openCloseBtn[i].addEventListener("click", openClose, false);
    }

    //ボタンを押すことでテキストのshow,hideを切り替える。
    let headerSearch = document.getElementsByClassName("header-search");

    function headerSearchTextShow() {
        const headerSearchTextCheckbox = document.getElementById("header-search-text-checkBox");
        const headerSearchText = document.getElementById("header-search-text");

        if (headerSearchTextCheckbox.checked == true) {
            headerSearchTextCheckbox.checked = false;
            headerSearchText.style.display = "none";
        } else {
            headerSearchTextCheckbox.checked = true;
            headerSearchText.style.display = "block";
        }
    }

    // headerSearch.addEventListener("click", headerSearchTextShow, false);
</script>
@endsection

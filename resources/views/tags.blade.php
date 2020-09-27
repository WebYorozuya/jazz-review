@extends('layouts.ourapp')

@section('title', '投稿のタグ一覧')

@section('css')
  <!-- Heroku -->
  <link rel="stylesheet" href="{{secure_asset('css/tags.css')}}">
  <!-- Local -->
  <link rel="stylesheet" href="{{asset('css/tags.css')}}">
@endsection

@section('main')
<h1 class="main-title">タグ一覧</h1>
  <div class="tag-home">
    <div class="main-tag-comment">
      <p class="comment-text">Jazz Logに登録されているタグの一覧です。 Jazz Logでは毎日様々なライブハウスの投稿がされています。</p>
    </div><!-- /.main-tag-comment -->
    <div class="main-list">
      <div class="TagList-item" data-count="#">
        <a class="TagList-label" href="#">
          <span>BLUE NOTE 東京</span>
        </a>
      </div>
    </div><!-- main-list -->
  </div><!-- tag-home -->
@endsection

@section('js')
<script>
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

        headerSearch.addEventListener("click", headerSearchTextShow, false);

    </script>
@endsection

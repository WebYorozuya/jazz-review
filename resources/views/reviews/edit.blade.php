@extends('layouts.ourapp')

@section('title', '投稿を修正する')

@section('css')
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css Heroku-->
  <link type="text/css" rel="stylesheet" href="{{ secure_asset('css/ourmaterialize.css') }}"  media="screen,projection"/>
  <!--Import materialize.css Local-->
  <link type="text/css" rel="stylesheet" href="{{ asset('css/ourmaterialize.css') }}"  media="screen,projection"/>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- Heroku -->
  <link rel="stylesheet" href="{{secure_asset('css/post.css')}}">
  <!-- Local -->
  <link rel="stylesheet" href="{{asset('css/post.css')}}">
@endsection

@component('components.header')
@slot('user')
    @if (Route::has('login'))
    @auth
      {{$user->account_name}}
    @endauth
    @else
      {{$user = 'ゲスト'}}
    @endif
@endslot
@endcomponent

@section('main')
<h1 class="main-title">レビューを修正する</h1>
<div class="form_container">
    <form action="update" id="create-account" method="POST">
    @csrf
        <h1>投稿を修正する</h1>
        <input type="hidden" name="user_id" value="{{$review->user_id}}">
        <input type="hidden" name="id" value="{{$review->id}}">
        <label for="live_date">ライブに行った日</label>
        <input type="date" id="live_date" name="live_date" value="{{$review->live_date}}">
        <label for="tag">タグ</label>
        <input type="text" id="tag" name="tag_name" value="@foreach ($review->tags as $tag){{$tag->tag_name}} @endforeach">
        <label for="title">レビューのタイトル</label>
        <input type="text" id="title" name="title" value="{{$review->title}}">
        <label for="text">ライブの感想</label>
        <textarea name="text" id="text" cols="30" rows="10">{{$review->text}}</textarea>
        <p style="text-align: right; font-size: 0.8rem;">（XXXX文字以内）</p>
        <input type="submit" class="submit" value="修正">
    </form>
    <form action="del" method="post">
    @csrf
        <input type="hidden" name="user_id" value="{{$review->user_id}}">
        <input type="hidden" name="id" value="{{$review->id}}">
        <input type="hidden" name="live_date" value="{{$review->live_date}}">
        <input type="hidden" name="title" value="{{$review->title}}">
        <input type="hidden" name="text" value="{{$review->text}}">
        <input type="submit" class="submit" id="del" value="削除">
    </form>
  </div><!-- /.form_container -->
@endsection

@section('js')
<script type="text/javascript">
    //今日の日時を表示
        window.onload = function () {
            //今日の日時を表示
            var date = new Date()
            var year = date.getFullYear()
            var month = date.getMonth() + 1
            var day = date.getDate()
          
            var toTwoDigits = function (num, digit) {
              num += ''
              if (num.length < digit) {
                num = '0' + num
              }
              return num
            }
            
            var yyyy = toTwoDigits(year, 4)
            var mm = toTwoDigits(month, 2)
            var dd = toTwoDigits(day, 2)
            var ymd = yyyy + "-" + mm + "-" + dd;
            
            document.getElementById("live_date").value = ymd;
        }
</script>
<script>//チップスのjQuery
$(function (){
  $('.chips').chips();
  $('.chips-initial').chips({
    data: [{
      tag: 'Jazz',
    }, {
      tag: '東京',
    }],
  });
  $('.chips-placeholder').chips({
    placeholder: 'Enter a tag',
    secondaryPlaceholder: '+Tag',
  });
  // $('.chips-autocomplete').chips({
  //   autocompleteOptions: {
  //     data: {
  //       'ブルーノート東京': null,
  //       'コットンクラブ東京': null,
  //       "Kelly's大阪": null
  //     },
  //    limit: Infinity,
  //    minLength: 1
  //  }
  //});
});
</script>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="{{ asset('js/materialize.js') }}">
  // document.addEventListener('DOMContentLoaded', function() {
  //   var elems = document.querySelectorAll('.chips');
  //   var instances = M.Chips.init(elems, options);
  // });
  var instance = M.Chips.getInstance(elem);

  instance.addChip({
    tag: 'chip content',
    //image: '', // optional
  });
  
  instance.deleteChip(3); // Delete 3rd chip.

  instance.selectChip(2); // Select 2nd chip
</script>
<script>
  let tag = document.querySelector('.chip'); //.chipクラスの要素を取得
  let tagName = tag.innerHTML;//タグ内の要素を取得→エラー
  //let tagName = "france";//タグ内の要素を取得
  let inputTag = document.getElementById("tag");//<input id="tag">を取得
  let submit = document.querySelector('.submit');//送信ボタンを取得

  function tagSubmit() {
    inputTag.innerHTML = tagName;//tagNameを<input id="tag">の値として追加
    //inputTag.textContent = 'france';//tagNameを<input id="tag">の値として追加
  }

  submit.addEventListener('submit', () => {
    tagSubmit();
  });
  // innerHTMLプロパティ
</script>
@endsection

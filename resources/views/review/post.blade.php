<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.css') }}"  media="screen,projection"/>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <style>
    html, body {
      background-color: #f5F5F5;
      color: #636b6f;
      font-family: 'Nunito', sans-serif;
      font-weight: 200;
      height: 100vh;
      margin: 0;
    }
    .form_container {
      width: 70%;
      height: 800px;
      margin: 100px auto;
      background-color: #fff;
    }
    form {
      width: 80%;
      margin: 2px auto;
      padding-top: 40px;
      display: flex;
      flex-direction: column;
    }
    label, input, textarea {
      padding: 3px 0;
    }
    input, textarea {
      border: .5px solid rgb(219, 217, 217);
      padding: 5px 8px;
    }
    .submit {
      width: 240px;
      font-size: 15px;
      text-align: center;
      font-weight: bold;
      border: none;
      border-radius: 5px;
      background-color: rgb(252, 180, 48);
      color: rgb(39, 37, 37);
      margin: 30px auto;
      padding: 8px;
    }
  </style>
</head>
<body>
  <div class="form_container">
    <form action="insert" id="create-account" method="POST">
    @csrf
      @if  (Route::has('login'))
        @auth
        <h1>{{$user->name}}さん、ライブの感想を記録しましょう</h1>
        <input type="hidden" name="user_id" value="{{$user->id}}">
        @else
        <h1>{{$user}}さん、ライブの感想を記録しましょう</h1>
        <input type="hidden" name="user_id" value="2">
      @endif
      @endauth
        <label for="live_date">ライブに行った日</label>
        <input type="date" id="live_date" name="live_date">
        <label for="tag">タグ</label>

        <div class="chips chips-placeholder">
        <input type="text" id="tag" name="tag_name" placeholder="Enter a tag" class="tag">
        </div>
        
        <label for="title">レビューのタイトル</label>
        <input type="text" id="title" name="title">
        <label for="text">ライブの感想</label>
        <textarea name="text" id="text" cols="30" rows="10"></textarea>
        <p style="text-align: right; font-size: 0.8rem;">（1000文字以内）</p>
        <!-- <input type="button" class="submit" value="投稿する"> -->
        <input type="button" class="submit" onclick="submit();" value="投稿する">
      </form>  
  </div><!-- /.form_container -->
</body>
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
<script>
$(function (){
  $('.chips').chips();
  $('.chips-initial').chips({
    data: [{
      tag: 'Apple',
    }, {
      tag: 'Microsoft',
    }, {
      tag: 'Google',
    }],
  });
  $('.chips-placeholder').chips({
    placeholder: 'Enter a tag',
    secondaryPlaceholder: '+Tag',
  });
  $('.chips-autocomplete').chips({
    autocompleteOptions: {
      data: {
        'Apple': null,
        'Microsoft': null,
        'Google': null
      },
      limit: Infinity,
      minLength: 1
    }
  });
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
    image: '', // optional
  });
  
  instance.deleteChip(3); // Delete 3rd chip.

  instance.selectChip(2); // Select 2nd chip
</script>
</html>

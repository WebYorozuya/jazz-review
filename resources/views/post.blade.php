<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <title>Jazz Log</title>
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
        <h1>{{$user}}さん、ライブの感想を記録しましょう</h1>
        <input type="hidden" name="user_id" value="2">
      @else
      <h1>{{$user->name}}さん、ライブの感想を記録しましょう</h1>
        <input type="hidden" name="user_id" value="{{$user->id}}">
      @endif
        <label for="live_date">ライブに行った日</label>
        <input type="date" id="live_date" name="live_date">
        <label for="title">レビューのタイトル</label>
        <input type="text" id="title" name="title">
        <label for="text">ライブの感想</label>
        <textarea name="text" id="text" cols="30" rows="10"></textarea>
        <p style="text-align: right; font-size: 0.8rem;">（1000文字以内）</p>
        <input type="submit" class="submit">
      </form>
  </div><!-- /.form_container -->
</body>
</html>

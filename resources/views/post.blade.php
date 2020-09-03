<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <link rel="stylesheet" href="styles.css">
  <title>Jazz Log</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
  <form action="" id="create-account">
      <h1>{{$user}}さん、ライブの感想をどうぞ</h1>
      <label for="live_date">ライブに行った日</label>
      <input type="date" id="live_date">
      <label for="musician">ミュージシャン</label>
      <input type="text" id="musician">
      <label for="venue">ライブ会場</label>
      <input type="text" id="venue">
      <label for="review">ライブの感想</label>
      <textarea name="" id="review" cols="30" rows="10"></textarea>
      <p>1000文字以内</p>
      <button>投稿する</button>
    </form>
</body>
</html>
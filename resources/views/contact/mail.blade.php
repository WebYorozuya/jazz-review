<head>
  <style>
    h1 {
      font-size: 18px;
    }
    p {
      font-size: 14px;
    }
  </style>
</head>
<body>
  <h1>{{$data["name"]}}様からの、お問い合わせを受信しました。</h1>
  
  <p>メールアドレス: {{$data["email"]}}</p>
  <p>内容:  {{$data["text"]}}</p>
</body>

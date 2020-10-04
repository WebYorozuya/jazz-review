<!DOCTYPE html><!--9.16 GitHub mikeブランチから-->
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico" />
    <!-- CSS RESET -->
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/aaab412f99.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"> -->
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css Heroku-->
    <link type="text/css" rel="stylesheet" href="{{ secure_asset('css/ourmaterialize.css') }}"  media="screen,projection"/>
    <!--Import materialize.css Local-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/ourmaterialize.css') }}"  media="screen,projection"/>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Heroku用 -->
    <link rel="stylesheet" href="{{secure_asset('css/styles.css')}}">
    <!-- ローカル用 -->
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    @yield('css')
    <title>@yield('title')</title>
</head>
<body class="UI_Build_Assistant">
<header>
  <div class="header-container">
    <div class="header-start">
      <div class="header-siteName">
        <a href="/"><img src="images/JazzLog-logo-white.png" class="siteLogo"></a>
      </div>
      <form class="header-search" action="cgi-bin/example.cgi" method="post">
        <!-- <div id="search-units"> -->
            <!-- <input class="header-search-btn" type="submit" name="submit" value=""> -->
            <i class="fas fa-search"></i>
            <input id="header-search-text" type="search" name="search" placeholder="キーワードで検索">
            <!-- <input id="header-search-text-checkBox" type="checkbox" /> -->
        <!-- </div> -->
      </form>
    </div>
    <div class="header-end">
            <a href="post" class="header-post">
            <i class="fas fa-pen-nib"></i>
                投稿する
            </a>
        @if (Route::has('login'))
        <div class="header-loginUser">
            <!-- <input id="header-loginUser-acd-check" class="header-loginUser-acd-check" type="checkbox"> -->
            <label class="header-loginUser-acd-label" for="header-loginUser-acd-check">
            <i class="far fa-user-circle fa-2x"></i>
                @auth
                <a href="{{ url('/home') }}" class="hello-user">こんにちは<br>{{$user->account_name}}さん</a>
                @else
                <a href="{{ route('login') }}" class="hello-user">ログイン</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="hello-user">アカウント登録</a>
                @endif
            @endauth
            </label>
            <div class="header-loginUser-acd-content">
                <a href="/login">
                    <div class="header-loginUser-acd-content-login">ログイン</div>
                </a>
                <a href="#">
                    <div class="header-loginUser-acd-content-logout">ログアウト</div>
                </a>
                <a href="#">
                    <div class="header-loginUser-acd-content-account">アカウント登録</div>
                </a>
            </div><!-- /.header-loginUser-acd-content -->
        </div><!-- /.header-loginUser -->
        @endif                
    </div><!-- /.header-end -->
  </div><!-- /.header-container -->
</header>
<div class="home">
  @if (session('flash_message'))
    <div class="flash_message alert alert-success" style="margin:0">
      {{ session('flash_message') }}
    </div>
  @endif
  <div class="home-container">
    <nav>
      <ul class="pc-nav">
        <li>
          <a href="/" class="li-newInformation">
            <i class="fas fa-music fa-lg"></i>
            <span>新着レビュー</span>
          </a>
        </li>
        <li>
          <a href="tags" class="li-player">
            <i class="fas fa-tags"></i>
            <span>タグ</span>
          </a>
        </li>
        <li>
          <a href="post" class="li-livehouse">
            <i class="fas fa-pen-nib"></i>
            <span>投稿する</span>
          </a>
        </li>
        <li>
          <a href="contact" class="li-livehouse">
            <i class="far fa-smile"></i>
            <span>お問い合わせ</span>
          </a>
        </li>
      </ul>
      <div class="mobile-nav">
        <form method="get" action="" class="mobile-nav-form">
            <div class="pulldown">
                <select name="pulldown" class="pulldown-option" required>
                    <option value="">選択してください</option>
                    <option value="選択肢1">新着順</option>
                    <option value="選択肢2">プレイヤー</option>
                    <option value="選択肢3">ライブハウス</option>
                </select>
            </div>
            <div class="pulldown-select">
                <input type="submit" value="選択">
            </div>
        </form>
      </div>
    </nav>
    <div class="right-container">
      <!-- 投稿表示スペース -->    
      <main>
        <!-- <h1 class="main-title">@yield('h1')</h1> -->
        @section('main')
        @show
      </main>
        <aside>
            <!-- <a href="#">
                <div class="ad1">advertisement1</div>
            </a>
            <a href="#">
                <div class="ad2">advertisement2</div>
            </a> -->
        </aside>
    </div>
  </div>
</div>
<footer class="footer">
    <div class="footer-container">
        <div class="footer-left">
            <div class="footer-left">
                <a href="#"><img src="images/JazzLog-logo-white.png" class="footer-siteLogo"></a>
                <div class="footer-subTitle">♪♪ Jazz for all people ♪♪</div>
            </div>
        </div>
        <div class="footer-right">
            <a href="contact" class="information1">お問い合わせ</a>
            <a href="terms" class="information2">利用規約</a>
        </div>
    </div>
</footer>
@yield('js')
<script>
  // http://keylopment.com/faq/529/ こちらを参照
  if($('.footer').length){
	var imgpass = "../images/";
	// 表示させたい画像のファイル名＋拡張子を配列に格納
	var imgfile = [];
	imgfile[0] = 'trumpet.jpg';
	imgfile[1] = 'jazzclub.jpg';
	// imgfile[2] = 'bg03.jpg';
	// imgfile[3] = 'bg04.jpg';
	// 画像の数を元に、ランダムな数値を算出
	var n = Math.floor(Math.random() * imgfile.length);
	var bgbox = $('.footer');
	// 算出したランダムな数値の順番にいるファイル情報をbackground-imageに設定する
	bgbox.css('background-image', 'url(' + imgpass + imgfile[n] + ');');
}
</script>
<script>
  (function() {
    'use strict';
    $(function(){
      $('.flash_message').fadeOut(5000);
    });
  })();
</script>
</body>
</html>

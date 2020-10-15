<!DOCTYPE html>
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
  <link type="text/css" rel="stylesheet" href="{{ secure_asset('css/ourmaterialize.css') }}" media="screen,projection" />
  <!--Import materialize.css Local-->
  <link type="text/css" rel="stylesheet" href="{{ asset('css/ourmaterialize.css') }}" media="screen,projection" />
  
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <!-- Import materialize.css Local -->
  <script type="text/javascript" src="{{ asset('js/materialize.js') }}"></script>
 
  <!-- Heroku用 -->
  <link rel="stylesheet" href="{{secure_asset('css/styles.css')}}">
  <!-- ローカル用 -->
  <link rel="stylesheet" href="{{asset('css/styles.css')}}">
  @yield('css')
  <title>@yield('title')</title>
</head>

<body>
<!-- headerはここにcomponentで -->
  <div class="back"></div>
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
            <a href="/" class="li-newInformation" id="newInformation">
              <i class="fas fa-music fa-lg"></i>
              <span>新着レビュー</span>
            </a>
          </li>
          <li>
            <a href="tags" class="li-player" id="tags">
              <i class="fas fa-tags"></i>
              <span>タグ</span>
            </a>
          </li>
          <li>
            <a href="post" class="li-livehouse" id="post">
              <i class="fas fa-pen-nib"></i>
              <span>投稿する</span>
            </a>
          </li>
          <li>
            <a href="contact" class="li-livehouse" id="contact">
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
          @section('main')
          @show
        </main>
        <aside>
          <a href="https://sonicacademy.jp/mm/online/yosukeonuma_vol-2/" target="blank">
            <div class="aside1"></div>
          </a>
          <a href="http://sonicacademy.jp/mm/" target="blank">
            <div class="aside2"></div>
          </a>
        </aside>
      </div>
    </div>
  </div>
  <footer class="footer" id="footer">
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
  <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</body>
</html>

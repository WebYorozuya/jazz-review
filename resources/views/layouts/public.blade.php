<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="images/favicon.ico">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/aaab412f99.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  @env('local')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/ourmaterialize.css') }}" media="screen,projection" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  @endenv
  @production
    <link type="text/css" rel="stylesheet" href="{{ secure_asset('css/ourmaterialize.css') }}" media="screen,projection" />
    <link rel="stylesheet" href="{{ secure_asset('css/styles.css') }}">
  @endproduction
  @yield('css')
  <title>@yield('title')</title>
</head>
<body>
  @yield('header')
  <div class="home">
    @if (session('flash_message'))
      <div class="flash_message alert alert-success" style="margin:0">
        {{ session('flash_message') }}
      </div>
    @endif
    <div class="home-container">
      <nav id="navigation-menu">
        <ul class="pc-nav">
          <li>
            <a href="{{ route('top') }}" class="li-newInformation" id="newInformation">
              <i class="fas fa-music fa-lg"></i>
              <span>新着レビュー</span>
            </a>
          </li>
          <li>
            <a href="{{ route('tags') }}" class="li-player" id="tags">
              <i class="fas fa-tags"></i>
              <span>タグ</span>
            </a>
          </li>
          <li>
            <a href="{{ route('post') }}" class="li-livehouse" id="post">
              <i class="fas fa-pen-nib"></i>
              <span>投稿する</span>
            </a>
          </li>
          <li>
            <a href="{{ route('contact') }}" class="li-livehouse" id="contact">
              <i class="far fa-smile"></i>
              <span>お問い合わせ</span>
            </a>
          </li>
        </ul>
        <select class="pulldown" onchange="location.href=value;" required>
          <option class="default-menu">---  Menu  ---</option>
          <option value="{{ route('top') }}">新着レビュー</option>
          <option value="{{ route('tags') }}">タグ</option>
          <option value="{{ route('post') }}">投稿する</option>
          <option value="{{ route('contact') }}">お問い合わせ</option>
        </select>
      </nav>
      <div class="right-container">
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
      </div><!-- /.right-container -->
    </div><!-- /.home-container -->
  </div><!-- /.home -->
  <footer class="footer" id="footer">
    <div class="footer-container">
      <div class="footer-left">
        <div class="footer-left">
          <a href="/"><img src="images/JazzLog-logo-white.png" class="footer-siteLogo"></a>
          <div class="footer-subTitle">♪♪ Jazz for all people ♪♪</div>
        </div>
      </div>
      <div class="footer-right">
        <a href="contact" class="information1">お問い合わせ</a>
        <a href="terms" class="information2">利用規約</a>
      </div>
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  @env('local')
    <script type="text/javascript" src="{{ asset('js/materialize.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/highlight_nav_link.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/footer_fig_resize.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/footer_img_random_change.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/thanks_message.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/login_dd.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/header_search_form.js') }}"></script>
  @endenv
  @production
    <script type="text/javascript" src="{{ secure_asset('js/materialize.js') }}"></script>
    <script type="text/javascript" src="{{ secure_asset('js/highlight_nav_link.js') }}"></script>
    <script type="text/javascript" src="{{ secure_asset('js/footer_fig_resize.js') }}"></script>
    <script type="text/javascript" src="{{ secure_asset('js/footer_img_random_change.js') }}"></script>
    <script type="text/javascript" src="{{ secure_asset('js/thanks_message.js') }}"></script>
    <script type="text/javascript" src="{{ secure_asset('js/login_dd.js') }}"></script>
    <script type="text/javascript" src="{{ secure_asset('js/header_search_form.js') }}"></script>
  @endproduction

  @yield('js')
</body>
</html>

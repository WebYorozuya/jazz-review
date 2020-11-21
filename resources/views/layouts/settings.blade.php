<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="images/favicon.ico">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <script src="https://kit.fontawesome.com/aaab412f99.js" crossorigin="anonymous"></script>
  @env('local')
  <link rel="stylesheet" href="{{asset('css/settings.css')}}">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}" defer></script>
  @endenv
  @production
  <link rel="stylesheet" href="{{secure_asset('css/settings.css')}}">
  <script src="{{secure_asset('js/app.js') }}" defer></script>
  @endproduction
  @yield('css')
</head>
<body>
  @yield('header')
  <div class="settings-container">
    <!-- <div class="card-header">{{ __('アカウント設定') }}</div> -->

    <!-- <div class="card-body">
      @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @endif
    </div> -->

    <!-- home画面にpassword変更ボタン -->
    <div class="settings-menu">
      <nav>
        <ul class="pc-nav">
          <li>
            <a href="{{url('output')}}">プロフィールの編集</a>
          </li>
          <li>
            <a href="{{url('changepassword')}}">パスワード変更</a>
          </li>
          <li>
            <a href="#">退会</a>
          </li>
        </ul>
        <div class="mobile-nav">
          <form method="get" action="" class="mobile-nav-form">
            <div class="pulldown">
              <select name="pulldown" class="pulldown-option" required>
                <option value="">選択してください</option>
                <option value="選択肢1">プロフィール編集</option>
                <option value="選択肢2">パスワード変更</option>
                <option value="選択肢4">退会</option>

              </select>
            </div>
            <div class="pulldown-select">
              <input type="submit" value="選択">
            </div>
          </form>
        </div><!-- /.mobile-nav -->
      </nav>
      <main>
        @section('main')
        @show
      </main>
    </div><!-- /.settings-menu -->
  </div><!-- /.settings-container -->
  @env('local')
    <script type="text/javascript" src="{{ asset('js/login_dd.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/header_search_form.js') }}"></script>
  @endenv
  @production
    <script type="text/javascript" src="{{ secure_asset('js/login_dd.js') }}"></script>
    <script type="text/javascript" src="{{ secure_asset('js/header_search_form.js') }}"></script>
  @endproduction
</body>
</html>

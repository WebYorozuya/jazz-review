<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS RESET -->
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="images/favicon.ico">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/aaab412f99.js" crossorigin="anonymous"></script>

  @env('local')
  <link rel="stylesheet" href="{{asset('css/styles.css')}}">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}" defer></script>
  @endenv
  @production
  <link rel="stylesheet" href="{{secure_asset('css/styles.css')}}">
  <script src="{{secure_asset('js/app.js') }}" defer></script>
  @endproduction
  @yield('css')
</head>

<body>
  @yield('header')
  <div class="home">
    <div class="card-header">{{ __('アカウント設定') }}</div>

    <div class="card-body">
      @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @endif
    </div>

    <!-- home画面にpassword変更ボタン -->
    <div class="home-container">
      <nav>
        <ul class="pc-nav">
          <li>
            <a href="{{url('changepassword')}}">
              <span>パスワード変更</span>
            </a>
          </li>
          <!-- プロフィール画像 -->
          <li>
            <a href="{{url('output')}}">
              <span>プロフィール画像設定</span>
            </a>
          </li>
        </ul>
      </nav>
      <div class="right-container">
        <main>
          @section('main')
          @show
        </main>
      </div><!-- /.right-container -->
    </div><!-- /.home-container -->
  </div><!-- /.home -->

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
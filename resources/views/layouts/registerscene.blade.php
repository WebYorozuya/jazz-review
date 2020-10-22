<!-- 新規登録画面 -->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- font awesome -->
  <script src="https://kit.fontawesome.com/aaab412f99.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <!-- Heroku用 -->
    <link rel="stylesheet" href="{{secure_asset('css/styles.css')}}">
    <!-- ローカル用 -->
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @component('components.header')
        @slot('user')
            @if(Auth::check())<!--ログインしているかの確認 -->
             {{Auth::user()->account_name}}
            @else
             ゲスト
            @endif
        @endslot
        @endcomponent
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
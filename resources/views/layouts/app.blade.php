<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
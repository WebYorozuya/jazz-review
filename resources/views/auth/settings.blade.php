<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS RESET -->
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">

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
    <link href="{{ asset('css/mypage.css') }}" rel="stylesheet">
</head>

<body>
    @component('components.header')
    @slot('user')
    @if(Auth::check())
    <!--ログインしているかの確認 -->
    {{Auth::user()->account_name}}
    @else
    ゲスト
    @endif
    @endslot
    @endcomponent
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><!-- {{ __('マイページ') }}--></div> 

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <!-- {{ __('You are logged in!') }} -->
                    </div>
                    <!-- home画面にpassword変更ボタン -->
                    <div class="card-body">
                        <a href="{{url('changepassword')}}">
                            @csrf
                            <input type="submit" name="submit" value="パスワード変更">
                        </a>
                    </div>
                    <!-- プロフィール画像 -->
                    <div>
                        <a href="{{url('output')}}">
                            <input type="submit" name="submit" value="プロフィール画像設定">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <main class="py-4">
        @yield('content')
    </main>

    <!-- app.js -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>

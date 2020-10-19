<!-- 新規登録画面 -->
@extends('layouts.registerscene')  

@section('title','新規登録')

@section('content') 
<main>
    <div class="left-container">
        <div class="welcome">
            <h1>Welcome to Jazz Log</h1>
            <h2>〜 jazz for all people 〜</h2>
        </div>
    </div> <!-- /.left-container -->
    <div class="right-container">
        <div class="signup">
            <h3>{{ __('♪ 新規登録してね ♪') }}</h3>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="signup_form">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('氏名') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- 新規登録画面にaccount_nameを表示 -->
                    <div class="signup_form">
                        <label for="account_name" class="col-md-4 col-form-label text-md-right">{{ __('アカウント名') }}</label>

                        <div class="col-md-6">
                            <input id="account_name" type="text" class="form-control @error('account_name') is-invalid @enderror" name="account_name" value="{{ old('account_name') }}" required autocomplete="account_name" autofocus>

                            @error('account_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="signup_form">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="signup_form">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>
                        <p>( 8文字以上32文字以内 )</p>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="signup_form">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワード確認') }}</label>
                        <p>( 上と同じパスワードを入力してください )</p>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="access">
                        <div class="login">すでにアカウントをお持ちの場合 ：<a href="{{ route('login') }}">ログイン</a></div>
                        <div class="not_signup">登録せずに利用する場合 ：<a href="/">こちら</a></div>
                    </div>

                    <div class="btn_signup">
                        <button type="submit" class="btn btn-primary">
                            {{ __('登録する') }}
                        </button>
                    </div> <!-- /.btn_signup -->

                </form>

            </div> <!-- /.card-body -->
        </div> <!-- /.signup -->
    </div> <!-- /.right-container -->
</main>
@endsection


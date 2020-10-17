<!-- ログイン画面 -->
@extends('layouts.loginscene')

@section('title','ログイン画面')

@section('content')


<main>
    <div class="login">
        <h1>Jazz Log にログイン</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="login_form">
                <label for="account_name" class="col-md-4 col-form-label text-md-right">{{ __('アカウント名 or メールアドレス') }}</label>

                <div class="col-md-6">
                    <input id="account_name" type="text" class="form-control @error('account_name') is-invalid @enderror" name="account_name" value="{{ old('account_name') }}" required autocomplete="account_name" autofocus>

                    @if($errors->has('account_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('account_name') }}</strong>
                    </span>
                    @endif
                </div>
            </div> <!-- /.login_form -->

            <div class="login_form">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div> <!-- /.login_form -->

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('パスワードを保存する') }}
                </label>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('ログイン') }}
                    </button>
                </div>
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('パスワードを忘れた場合 : こちら') }}
                </a>
                @endif
            </div> <!-- /.form-group row mb-0 -->

        </form>

    </div><!-- /.login -->
</main>
@endsection
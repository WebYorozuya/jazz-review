@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/mypage.css')}}">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('マイページ') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
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
                    <a href="{{url('upload')}}">
                        <input type="submit" name="submit" value="プロフィール画像設定">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
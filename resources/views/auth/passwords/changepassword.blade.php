<!-- パスワード変更画面 -->
@extends('layouts.settings')

@section('css')
<link rel="stylesheet" href="{{asset('css/form.css')}}">
@endsection

@section('header')
  @component('components.header')
  @endcomponent
@endsection



@section('main')
  <div class="form-container">
    <h1>パスワード変更</h1>

    @if(session('change_password_error'))
      <div class="container mt-2">
        <div class="alert alert-danger">
          {{session('change_password_error')}}
        </div>
      </div>
    @endif

    @if(session('change_password_success'))
      <div class="container mt-2">
        <div class="alert alert-success">
          {{session('change_password_success')}}
        </div>
      </div>
    @endif

    <form method="POST" action="{{route('changepassword')}}">
      @csrf
      <div class="form-group">
        <label for="current">現在のパスワード</label>
        <div>
          <input id="current" type="password" class="form-control" name="current-password" required autofocus>
        </div>
      </div>

      <div class="form-group">
        <label for="password">新しいパスワード</label>
        <div>
          <input id="password" type="password" class="form-control" name="new-password" required>
          @if($errors->has('new-password'))
          <span class="help-block">
            <strong>{{ $errors->first('new-password')}}</strong>
          </span>
          @endif
        </div>
      </div>

      <div class="form-group">
        <label for="confirm">新しいパスワード(確認用）</label>
        <div>
          <input id="confirm" type="password" class="form-control" name="new-password_confirmation" required>
        </div>
      </div>

      <div>
        <button type="submit" class="btn btn-primary">変更</button>
      </div>
    </form>

  </div>
<!--changepw-container -->
@endsection
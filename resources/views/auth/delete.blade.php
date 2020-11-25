<!-- パスワード変更画面 -->
@extends('layouts.settings')

@section('css')
	<link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('header')
  @component('components.header')
  @endcomponent
@endsection

@section('main')
	<div class="panel panel-default">
		<div class="panel-body">
			<p>本当に削除してよろしいですか？</p>
		</div>
	</div>
	<div class="col-md-2 col-md-offset-5">
		<form action="{{ route('destroy')}}" method="post">
			@csrf
			@method('DELETE')
			<div>
				<span>本当に退会しますか？？？</span>
			</div>
			<div>
				<a class='btn'>キャンセル</a>
				<button type="submit" class='btn'>退会</button>
			</div>
		</form>
	</div>
@endsection
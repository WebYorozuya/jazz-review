@extends('layouts.settings')

@section('css')
<link rel="stylesheet" href="{{asset('css/form.css')}}">
@endsection

@section('header')
  @component('components.header')
  @endcomponent
@endsection

@section('main')
<div class="panel panel-default">
	<div class="panel-body">
		<h1>本当に退会してもよろしいですか？</h1>
	</div>
</div>
<div class="col-md-2 col-md-offset-5">
	<form action="{{ route('destroy')}}" method="post">
		@csrf
		@method('DELETE')
		<div class="warning">
			<p>退会をすると、登録されたアカウント情報は復元できません。<br>
				また、同一のメールアドレスの再登録もできませんので、ご注意ください。</p>
		</div>
		<div class="submit-btn">
			<button type="submit" class="cancel-btn">キャンセル</button>
			<button type="submit" class="delete-btn">退会する</button>
		</div>
	</form>
</div>
@endsection
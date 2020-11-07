<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	<div id="app">
		<main class="py-4">
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
								<a href="{{url('output')}}">
									<input type="submit" name="submit" value="プロフィール画像設定">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
	@section('main')
	@show
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
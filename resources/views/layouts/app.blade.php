<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS RESET -->
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
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
    <div id="app">
        @component('components.header')
        @endcomponent
        <main class="py-4">
            @yield('content')
        </main>
    </div>
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
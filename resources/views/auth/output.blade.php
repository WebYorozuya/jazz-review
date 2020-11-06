@extends('layouts.app')

@section('content')

<!-- ローカル用 -->
<link rel="stylesheet" href="{{asset('css/output.css')}}">
<link href="{{ asset('css/output.css') }}" rel="stylesheet">

<a href="/upload">画像のアップロードに戻る</a>
<br>
@foreach($user_images as $user_image)
<img class='image-round1' src="{{ asset('../storage/uploads/' . $user_image['user_image']) }}">
<br>
@endforeach
@endsection
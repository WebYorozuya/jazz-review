@extends('layouts.ourapp')

@section('title', '利用規約')

@component('components.header')
  @slot('user')
    {{$user}}
  @endslot
@endcomponent

@section('main')
<h1>利用規約</h1>
@endsection

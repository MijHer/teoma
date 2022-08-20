@extends('layout')

@section('title', 'home')

@section('content')
	<h1>@lang('Home')</h1>
	@auth
		{{-- {{ auth()->user()->name }} --}}
		{{auth::user()->name}}
	@endauth
@endsection
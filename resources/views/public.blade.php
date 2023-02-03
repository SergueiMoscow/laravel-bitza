@extends('main')

@section('mainmenu')
    <ul class="nav-links">
        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
        <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
    </ul>
@endsection

@section('content')
   <div>Lang: {{ $lang ?? 'default'}}</div>
@endsection

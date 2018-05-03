@extends('frontend.template')

@section('content')
    @if(auth()->check())
        Hello, {{ auth()->user()->name }}!
        <form action="{{ route('logout') }}" method="post">
            {{ csrf_field() }}
            <button type="submit">Logout?</button>
        </form>
    @else
        <a href="{{ route('login') }}">Login</a>
    @endif
@endsection
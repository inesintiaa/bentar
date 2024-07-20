@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('content')
    @if (Auth::check())
        <h1>Welcome, {{ Auth::user()->name }}</h1>

        @if (Auth::user()->group == 'user')
            <a href="{{ route('user.konser') }}">Konser</a>
        @endif


        <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
            @csrf
            <button type="submit"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>
        </form>
    @else
        <h1>Welcome, Guest</h1>
        <a href="{{ route('auth.login') }}">Login</a>
        <a href="{{ route('auth.register') }}">Register</a>
    @endif
@endsection

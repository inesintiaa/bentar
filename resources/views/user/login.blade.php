@extends('layouts.auth.auth')

@section('title', 'Login')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form method="POST" action="{{ route('auth.login') }}">
        @csrf
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}"
                class="text-nowrap logo-img text-decoration-none text-dark d-flex flex-col justify-center align-items-center">
                <img src="{{ asset('assets/images/logos/logo.png') }}" width="50" alt="" />
                <h1 class="fs-5">MyConcert</h1>
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <h1 class="h3 mb-3 fw-normal">Login</h1>
        <div class="form-floating">
            <input type="email" class="form-control mb-3" name="email" placeholder="Masukkan Email">
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control mb-3" name="password" placeholder="Masukkan Password">
            <label for="floatingPassword">Password</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
    </form>
@endsection

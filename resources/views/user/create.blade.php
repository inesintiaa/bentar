@extends('layouts.admin.app')

@section('title', 'Peserta')

@section('content')
    <div class="d-flex flex-column gap-1">
        <div class="card">
            <div class="card-header">
                <h1 class="fs-4 text-center">
                    Form Tambah Data Peserta
                </h1>
            </div>
            @if ($errors->any())
                <div class="alert alert-primary alert-dismissible mx-4 mt-4 " role="alert">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-body">
                <form class="mx-4" action="{{ route('admin.peserta.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input required type="text" class="form-control" id="name" name="name"
                            data-custom-message="Tolong isi nama anda di sini.">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input required type="email" class="form-control" id="email" name="email"
                            data-custom-message="Tolong isi email anda di sini.">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input required type="password" class="form-control" id="password" name="password"
                            data-custom-message="Tolong isi password anda di sini." autocomplete="new-password">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="group">Role</label>
                        <select name="group" class="form-select" id="group">
                            <option value="admin">Admin</option>
                            <option selected value="user">User</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/field-message.js') }}"></script>
@endsection

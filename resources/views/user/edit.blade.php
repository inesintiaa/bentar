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
                <form class="mx-4" action="{{ route('admin.peserta.update', $users->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input required type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $users->name) }}" data-custom-message="Tolong isi nama anda di sini.">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input required type="email" class="form-control" id="email" name="email"
                            value="{{ old('email', $users->email) }}" data-custom-message="Tolong isi email anda di sini.">
                    </div>
                    <div class="mb-3">
                        <label for="old_password" class="form-label">Password Lama</label>
                        <input required type="password" class="form-control" id="old_password" name="old_password"
                            data-custom-message="Tolong isi password anda di sini." autocomplete="new-password">
                        <input type="checkbox" id="toggle-old-password" class="mt-2"> Tampilkan Password
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input required type="password" class="form-control" id="password" name="password"
                            data-custom-message="Tolong isi password anda di sini." autocomplete="new-password">
                        <input type="checkbox" id="toggle-password" class="mt-2"> Tampilkan Password
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="group">Role</label>
                        <select name="group" class="form-select" id="group">
                            @foreach (['admin', 'user'] as $item)
                                <option {{ $item == $users->group ? 'selected' : '' }} value="{{ $item }}">
                                    {{ Str::ucfirst(trans($item)) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>

    </div>
    <script src="{{ asset('assets/js/field-message.js') }}"></script>
    <script>
        document.getElementById('toggle-old-password').addEventListener('change', function() {
            var oldPasswordInput = document.getElementById('old_password');
            if (this.checked) {
                oldPasswordInput.type = 'text';
            } else {
                oldPasswordInput.type = 'password';
            }
        });
        document.getElementById('toggle-password').addEventListener('change', function() {
            var passwordInput = document.getElementById('password');
            if (this.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
        document.getElementById('toggle-password-confirmation').addEventListener('change', function() {
            var passwordConfirmationInput = document.getElementById('password_confirmation');
            if (this.checked) {
                passwordConfirmationInput.type = 'text';
            } else {
                passwordConfirmationInput.type = 'password';
            }
        });
    </script>
@endsection

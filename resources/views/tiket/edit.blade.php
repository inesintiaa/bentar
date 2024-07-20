@extends('layouts.admin.app')

@section('title', 'Edit Tiket')

@section('content')
    <div class="d-flex flex-column gap-1">
        <div class="card">
            <div class="card-header">
                <h1 class="fs-4 text-center">
                    Form Edit Data Tiket
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
                <form class="mx-4" action="{{ route('admin.tiket.update', $tiket->id) }}" method="POST">
                    @csrf
                    <div class="card">
                        <div style="height: 200px; overflow: hidden;">
                            <img class="card-img-top img-fluid"
                                style="height: 100%; width: 100%; object-fit: cover; object-position: center;"
                                src="{{ asset('storage/' . $tiket->konser->image) }}" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $tiket->konser->name }}</h5>
                            <p class="card-text">{{ $tiket->konser->location }}</p>
                            <p class="card-text">{{ $tiket->konser->start_time }}</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori</label>
                        <input readonly required type="text" class="form-control" id="category" name="category"
                            value="{{ $tiket->category }}" data-custom-message="Tolong isi nama anda di sini.">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga</label>
                        <input required type="number" class="form-control" id="price" name="price"
                            value="{{ $tiket->price }}" data-custom-message="Tolong isi lokasi tiket di sini.">
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input required type="number" class="form-control" id="quantity" name="quantity"
                            value="{{ $tiket->quantity }}" data-custom-message="Tolong isi lokasi tiket di sini.">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>
    <script src="{{ asset('assets/js/field-message.js') }}"></script>
    <script src="{{ asset('assets/js/time-picker.js') }}"></script>
@endsection

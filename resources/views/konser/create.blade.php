@extends('layouts.admin.app')

@section('title', 'Tambah Konser')

@section('content')
    <div class="d-flex flex-column gap-1">
        <div class="card">
            <div class="card-header">
                <h1 class="fs-4 text-center">
                    Form Tambah Data Konser
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
                <form class="mx-4" action="{{ route('admin.konser.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input required type="text" class="form-control" id="name" name="name"
                            data-custom-message="Tolong isi nama anda di sini.">
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Lokasi</label>
                        <input required type="text" class="form-control" id="location" name="location"
                            data-custom-message="Tolong isi lokasi konser di sini.">
                    </div>
                    <div class="mb-3 w-25">
                        <label for="date">Tanggal Konser</label>
                        <input required id="date" name="date" class="form-control" type="date"
                            data-custom-message="Tolong isi tanggal konser di sini." />
                    </div>
                    <div class="mb-3 w-25">
                        <label for="start_time">Time</label>
                        <div class="input-group date d-flex gap-2" id="timePicker">
                            <input name="start_time" id="start_time" type="text" class="form-control timePicker" required
                                data-custom-message="Tolong isi jam konser dimulai di sini.">
                            <span class="input-group-addon my-auto"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Thumbnail Konser</label>
                        <input class="form-control" type="file" id="image" name="image">
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

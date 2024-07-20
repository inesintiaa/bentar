@extends('layouts.peserta.app')

@section('title', 'Dashboard')
@section('content')
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            @foreach ($konser->take(3) as $index => $item)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}"
                    class="{{ $index == 0 ? 'active' : '' }} bg-dark" aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                    aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($konser->take(3) as $index => $item)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" style="height: 100vh;">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('storage/' . $item->image) }}" class="d-block w-100 h-auto"
                            style="height: 100%; width: 100%; object-fit: cover; overflow: hidden;"
                            alt="{{ $item->title }}">
                    </a>
                    <div class="carousel-caption d-none d-md-block text-dark">
                        <h5>{{ $item->name }}</h5>
                        <p>{{ $item->location }}</p>
                        <p>{{ $item->date }}</p>
                        <p>{{ $item->start_time }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container py-5">
        @if ($errors->any())
            <div class="alert alert-primary alert-dismissible mx-4 mt-4 " role="alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @foreach ($konser as $index => $item)
            <div class="card mb-5">
                <div class="overflow-hidden" style="height: 300px"><img src="{{ asset('storage/' . $item->image) }}"
                        class="d-block w-100 h-auto" style="height: 100%; width: 100%; object-fit: cover; overflow: hidden;"
                        alt="{{ $item->title }}">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p>{{ $item->location }}</p>
                    <p>{{ $item->date }}</p>
                    <p>{{ $item->start_time }}</p>
                    <a href="{{ route('user.konser.show', $item->id) }}" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        @endforeach
    </div>
    <script src="{{ asset('assets/js/field-message.js') }}"></script>
@endsection

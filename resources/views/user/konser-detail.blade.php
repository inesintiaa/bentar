@extends('layouts.peserta.app')

@section('title', 'Dashboard')
<style>

</style>
<link rel="stylesheet" href="{{ asset('assets/css/tiket.css') }}">

@section('content')
    <div class="container py-5">
        <div class="card mb-5">
            <div class="overflow-hidden" style="height: 300px"><img src="{{ asset('storage/' . $konser->image) }}"
                    class="d-block w-100 h-auto" style="height: 100%; width: 100%; object-fit: cover; overflow: hidden;"
                    alt="{{ $konser->title }}">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $konser->name }}</h5>
                <p>{{ $konser->location }}</p>
                <p>{{ $konser->date }}</p>
                <p>{{ $konser->start_time }}</p>
            </div>
        </div>
    </div>
    @php
        \Carbon\Carbon::setLocale('id');
    @endphp
    <div class="container">
        @foreach ($tiket as $item)
            <div class="ticket {{ strtolower($item->category) }}">
                <div class="ticket-date  {{ strtolower($item->category) }}">
                    <h2 class="fs-2">{{ \Carbon\Carbon::parse($item->konser->date)->translatedFormat('d') }}</h2>
                    <span class="fs-5">{{ \Carbon\Carbon::parse($item->konser->date)->translatedFormat('F') }}</span>
                </div>
                <div class="ticket-info">
                    <h5 class="fs-4">{{ $item->konser->name }}</h5>
                    <p>{{ \Carbon\Carbon::parse($item->konser->date)->translatedFormat('l d F Y') }}</p>
                    <p>{{ \Carbon\Carbon::parse($item->konser->start_time)->translatedFormat('H:i') }} - Selesai</p>
                    <p>{{ $item->konser->location }}</p>
                    <form action="{{ route('user.tiket.purchase') }}" method="POST">
                        @csrf
                        <input type="hidden" name="tiket_id" value="{{ $item->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-sm">BUY</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

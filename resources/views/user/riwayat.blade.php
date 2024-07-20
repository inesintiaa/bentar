@extends('layouts.peserta.app')

@section('title', 'Riwayat')

<link rel="stylesheet" href="{{ asset('assets/css/tiket.css') }}">

@section('content')
    <div class="container py-5">
        <div class="d-flex flex-column gap-1">
            <div>
                <h1>
                    Data Riwayat Transaksi
                </h1>
            </div>
            <table class="table" id="riwayatTable" class="table table-bordered" style="width:100%">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">quantity</th>
                        <th scope="col">subtotal</th>
                        <th scope="col">transaksi_id</th>
                        <th scope="col">konser_name</th>
                        <th scope="col">tiket_category</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($riwayat as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->quantity }}</td>
                            <td>@rupiah($item->subtotal)</td>
                            <td>{{ $item->transaksi->id }}</td>
                            <td>{{ $item->tiket->konser->name }}</td>
                            <td>{{ $item->tiket->category }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $riwayat->links() }}
            </div>
        </div>
    </div>
    @php
        \Carbon\Carbon::setLocale('id');
    @endphp
    <div class="container">
        @foreach ($riwayat as $item)
            <div class="ticket {{ strtolower($item->tiket->category) }}">
                <div class="ticket-date  {{ strtolower($item->tiket->category) }}">
                    <h2 class="fs-2">{{ \Carbon\Carbon::parse($item->tiket->konser->date)->translatedFormat('d') }}</h2>
                    <span
                        class="fs-5">{{ \Carbon\Carbon::parse($item->tiket->konser->date)->translatedFormat('F') }}</span>
                </div>
                <div class="ticket-info">
                    <p>Tiket No. {{ $item->tiket->id }}</p>
                    <h5 class="fs-4">{{ $item->tiket->konser->name }}</h5>
                    <p>{{ \Carbon\Carbon::parse($item->tiket->konser->date)->translatedFormat('l d F Y') }}</p>
                    <p>{{ \Carbon\Carbon::parse($item->tiket->konser->start_time)->translatedFormat('H:i') }} - Selesai</p>
                    <p>{{ $item->tiket->konser->location }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <div>
        {{ $riwayat->links() }}
    </div>
@endsection

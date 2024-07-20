@extends('layouts.admin.app')

@section('title', 'Data Riwayat Transaksi')

@section('content')
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
                @foreach ($riwayats as $item)
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
            {{ $riwayats->links() }}
        </div>
    </div>
@endsection

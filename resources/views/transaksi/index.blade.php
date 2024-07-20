@extends('layouts.admin.app')

@section('title', 'Data Transaksi')

@section('content')
    <div class="d-flex flex-column gap-1">
        <div>
            <h1>
                Data Transaksi
            </h1>
            <a href="{{ route('admin.transaksi.create') }}" class="btn btn-primary">
                Tambah Data <i class="bi bi-database-add"></i>
            </a>
        </div>
        <table class="table" id="transaksiTable" class="table table-bordered" style="width:100%">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">total_amount</th>
                    <th scope="col">transaction_date</th>
                    <th scope="col">peserta_id</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 1;
                @endphp
                @foreach ($transaksis as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>@rupiah($item->total_amount)</td>
                        <td>{{ $item->transaction_date }}</td>
                        <td>{{ $item->users->name }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.transaksi.edit', ['id' => $item->id]) }}" class="btn btn-primary">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.transaksi.delete', ['id' => $item->id]) }}">
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $transaksis->links() }}
        </div>
    </div>
@endsection

@extends('layouts.admin.app')

@section('title', 'Data Tiket')

@section('content')
    <div class="d-flex flex-column gap-1">
        <div>
            <h1>
                Data Tiket
            </h1>
        </div>
        <table class="table" id="tiketTable" class="table table-bordered" style="width:100%">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kategori Tiket</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Nama Konser</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 1;
                @endphp
                @foreach ($tikets as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->category }}</td>
                        <td>@rupiah($item->price)</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->konser->name }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.tiket.edit', ['id' => $item->id]) }}" class="btn btn-primary">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $tikets->links() }}
        </div>
    </div>
@endsection

@extends('layouts.admin.app')

@section('title', 'Konser')

@section('content')
    <div class="d-flex flex-column gap-1">
        <div>
            <h1>
                Data Konser
            </h1>
            <a href="{{ route('admin.konser.create') }}" class="btn btn-primary">
                Tambah Data <i class="bi bi-database-add"></i>
            </a>
        </div>
        <table class="table" id="konserTable" class="table table-bordered" style="width:100%">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Konser</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 1;
                @endphp
                @foreach ($konsers as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->location }}</td>
                        <td>{{ $item->date }}</td>
                        <td>{{ date('H:i', strtotime($item->start_time)) }}</td>
                        <td>{{ $item->image }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.konser.edit', ['id' => $item->id]) }}" class="btn btn-primary">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.konser.delete', ['id' => $item->id]) }}">
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
            {{ $konsers->links() }}
        </div>
    </div>
@endsection
